<?php
if ( !defined( 'MEDIAWIKI' ) ) die;

class NewMessages {
	static function markThreadAsUnreadByUser( $thread, $user ) {
		self::writeUserMessageState( $thread, $user, null );
	}

	static function markThreadAsReadByUser( $thread, $user ) {
		if ( is_object( $thread ) ) {
			$thread_id = $thread->id();
		} else if ( is_integer( $thread ) ) {
			$thread_id = $thread;
		} else {
			throw new MWException( __METHOD__ . " expected Thread or integer but got $thread" );
		}

		if ( is_object( $user ) ) {
			$user_id = $user->getID();
		} else if ( is_integer( $user ) ) {
			$user_id = $user;
		} else {
			throw new MWException( __METHOD__ . " expected User or integer but got $user" );
		}

		$dbw = wfGetDB( DB_MASTER );

		$dbw->delete(
			'user_message_state',
			array( 'ums_user' => $user_id, 'ums_thread' => $thread_id ),
			__METHOD__
		);

		self::recacheMessageCount( $user_id );
	}

	static function markAllReadByUser( $user ) {
		if ( is_object( $user ) ) {
			$user_id = $user->getID();
		} else if ( is_integer( $user ) ) {
			$user_id = $user;
		} else {
			throw new MWException( __METHOD__ . " expected User or integer but got $user" );
		}

		$dbw = wfGetDB( DB_MASTER );

		$dbw->delete(
			'user_message_state',
			array( 'ums_user' => $user_id ),
			__METHOD__
		);

		self::recacheMessageCount( $user_id );
	}

	private static function writeUserMessageState( $thread, $user, $timestamp ) {
		if ( is_object( $thread ) ) {
			$thread_id = $thread->id();
		} else if ( is_integer( $thread ) ) {
			$thread_id = $thread;
		} else {
			throw new MWException( "writeUserMessageState expected Thread or integer but got $thread" );
		}

		if ( is_object( $user ) ) {
			$user_id = $user->getID();
		} else if ( is_integer( $user ) ) {
			$user_id = $user;
		} else {
			throw new MWException( "writeUserMessageState expected User or integer but got $user" );
		}

		$dbw = wfGetDB( DB_MASTER );
		$dbw->replace(
			'user_message_state', array( array( 'ums_user', 'ums_thread' ) ),
			array( 'ums_user' => $user_id, 'ums_thread' => $thread_id,
			'ums_read_timestamp' => $timestamp ), __METHOD__
		);

		self::recacheMessageCount( $user_id );
	}

	/**
	 * Get the where clause for an update
	 * If the thread is on a user's talkpage, set that user's newtalk.
	 */
	private static function getWhereClause( $t ) {
		$dbw = wfGetDB( DB_MASTER );

		$tpTitle = $t->getTitle();
		$rootThread = $t->topmostThread()->root()->getTitle();

		// Select any applicable watchlist entries for the thread.
		$talkpageWhere = array(
			'wl_namespace' => $tpTitle->getNamespace(),
			'wl_title' => $tpTitle->getDBkey()
		);
		$rootWhere = array(
			'wl_namespace' => $rootThread->getNamespace(),
			'wl_title' => $rootThread->getDBkey()
		);

		$talkpageWhere = $dbw->makeList( $talkpageWhere, LIST_AND );
		$rootWhere = $dbw->makeList( $rootWhere, LIST_AND );

		return $dbw->makeList( array( $talkpageWhere, $rootWhere ), LIST_OR );
	}

	private static function getRowsObject( $t ) {
		// <= 1.15 compatibility, it kinda sucks having to do all this up here.
		$tables = array( 'watchlist', 'user_message_state' );
		$joins = array(
			'user_message_state' =>
			array(
				'left join',
				array(
					'ums_user=wl_user',
					'ums_thread' => $t->id()
				)
			)
		);
		$fields = array( 'wl_user', 'ums_user', 'ums_read_timestamp' );

		global $wgVersion;
		if ( version_compare( $wgVersion, '1.15.999', '<=' ) ) {
			$oldPrefCompat = true;

			$tables[] = 'user';
			$joins['user'] = array( 'left join', 'user_id=wl_user' );
			$fields[] = 'user_options';
		} else {
			$tables[] = 'user_properties';
			$joins['user_properties'] = array(
				'left join',
				array(
					'up_user=wl_user',
					'up_property' => 'lqtnotifytalk',
				)
			);
			$fields[] = 'up_value';
		}

		$dbr = wfGetDB( DB_SLAVE );
		return $dbr->select( $tables, $fields, self::getWhereClause( $t ), __METHOD__, array(), $joins );
	}

	/**
	 * Write a user_message_state for each user who is watching the thread.
	 * If the thread is on a user's talkpage, set that user's newtalk.
	 */
	static function writeMessageStateForUpdatedThread( $t, $type, $changeUser ) {
		wfDebugLog( 'LiquidThreads', 'Doing notifications' );
		wfProfileIn( 'writeMessageStateForUpdatedThread' );

		// Pull users to update the message state for, including whether or not a
		//  user_message_state row exists for them, and whether or not to send an email
		//  notification.
		$dbr = wfGetDB( DB_SLAVE );

		$userIds = array();
		$notifyUsers = array();
		$obj = self::getRowsObject( $t );
		while ( $row = $dbr->fetchObject( $obj ) ) {
			// Don't notify yourself
			if ( $changeUser->getId() == $row->wl_user )
				continue;

			if ( !$row->ums_user || $row->ums_read_timestamp ) {
				$userIds[] = $row->wl_user;
				NewMessages::recacheMessageCount( $row->wl_user );
			}

			$wantsTalkNotification = true;

			global $wgVersion;

			if ( version_compare( $wgVersion, '1.15.999', '<=' ) ) {
				$decodedOptions = self::decodeUserOptions( $row->user_options );

				$wantsTalkNotification = !isset( $decodedOptions['lqtnotifytalk'] );
			}
			$wantsTalkNotification = $wantsTalkNotification && User::getDefaultOption( 'lqtnotifytalk' );

			if ( $wantsTalkNotification || $row->up_value ) {
				$notifyUsers[] = $row->wl_user;
			}
		}

		// Add user talk notification
		if ( $t->getTitle()->getNamespace() == NS_USER_TALK ) {
			$name = $t->getTitle()->getText();

			$user = User::newFromName( $name );
			if ( $user && $user->getName() != $changeUser->getName() ) {
				$user->setNewtalk( true );

				$userIds[] = $user->getId();
				if ( $user->getOption( 'enotifusertalkpages' ) ) {
					$notifyUsers[] = $user->getId();
				}
			}
		}

		// Do the actual updates
		if ( count( $userIds ) ) {
			foreach ( $userIds as $u ) {
				$insertRows[] = array(
					'ums_user' => $u,
					'ums_thread' => $t->id(),
					'ums_read_timestamp' => null
				);
			}

			$dbw = wfGetDB( DB_MASTER );
			$dbw->replace(
				'user_message_state',
				array( array( 'ums_user', 'ums_thread' ) ),
				$insertRows, __METHOD__
			);
		}

		global $wgLqtEnotif;
		if ( count( $notifyUsers ) && $wgLqtEnotif ) {
			self::notifyUsersByMail( $t, $notifyUsers, wfTimestampNow(), $type );
		}
		wfProfileOut( 'writeMessageStateForUpdatedThread' );
	}

	// Would refactor User::decodeOptions, but the whole point is that this is
	//  compatible with old code :)
	static function decodeUserOptions( $str ) {
		$opts = array();
		$a = explode( "\n", $str );
		foreach ( $a as $s ) {
			$m = array();
			if ( preg_match( "/^(.[^=]*)=(.*)$/", $s, $m ) ) {
				$opts[$m[1]] = $m[2];
			}
		}

		return $opts;
	}

	static function notifyUsersByMail( $t, $watching_users, $timestamp, $type ) {
		wfLoadExtensionMessages( 'LiquidThreads' );
		$messages = array(
			Threads::CHANGE_REPLY_CREATED => 'lqt-enotif-reply',
			Threads::CHANGE_NEW_THREAD => 'lqt-enotif-newthread',
		);
		$subjects = array(
			Threads::CHANGE_REPLY_CREATED => 'lqt-enotif-subject-reply',
			Threads::CHANGE_NEW_THREAD => 'lqt-enotif-subject-newthread',
		);

		if ( !isset( $messages[$type] ) || !isset( $subjects[$type] ) ) {
			wfDebugLog( 'LiquidThreads', "Email notification failed: type $type unrecognised" );
			return;
		} else {
			$msgName = $messages[$type];
			$subjectMsg = $subjects[$type];
		}

		// Send email notification, fetching all the data in one go

		global $wgVersion;
		$tables = array( 'user' );
		$dbr = wfGetDB( DB_SLAVE );
		$fields = array( $dbr->tableName( 'user' ) . '.*' );
		$join_conds = array();
		$oldPreferenceFormat = false;
		if ( version_compare( $wgVersion, '1.16', '<' ) ) {
			$oldPreferenceFormat = true;
		} else {
			$tableNameUserProperties = $dbr->tableName( 'user_properties' );

			$tables[] = $tableNameUserProperties . ' as tc_prop';
			$fields[] = 'tc_prop.up_value as timecorrection';

			$join_conds[$tableNameUserProperties . ' as tc_prop'] = array(
				'left join',
				array(
					'tc_prop.up_user=user_id',
					'tc_prop.up_property' => 'timecorrection',
				)
			);

			$tables[] = $tableNameUserProperties . ' as l_prop';
			$fields[] = 'l_prop.up_value as language';

			$join_conds[$tableNameUserProperties . ' as l_prop'] = array(
				'left join',
				array(
					'l_prop.up_user=user_id',
					'l_prop.up_property' => 'language',
				)
			);
		}

		$res = $dbr->select(
			$tables, $fields,
			array( 'user_id' => $watching_users ), __METHOD__,
			array(), $join_conds
		);

		// Set up one-time data.
		global $wgPasswordSender;
		$link_title = clone $t->getTitle();
		$link_title->setFragment( '#' . $t->getAnchorName() );
		$permalink = LqtView::linkInContextURL( $t );
		$talkPage = $t->getTitle()->getPrefixedText();
		$from = new MailAddress( $wgPasswordSender, 'WikiAdmin' );
		$threadSubject = $t->subject();

		// Parse content and strip HTML of post content

		while ( $row = $dbr->fetchObject( $res ) ) {
			$u = User::newFromRow( $row );

			if ( $oldPreferenceFormat ) {
				$langCode = $u->getOption( 'language' );
			} elseif ( $row->language ) {
				$langCode = $row->language;
			} else {
				global $wgLanguageCode;
				$langCode = $wgLanguageCode;
			}

			$lang = Language::factory( $langCode );

			// Adjust with time correction
			if ( $oldPreferenceFormat ) {
				$timeCorrection = $u->getOption( 'timecorrection' );
			} else {
				$timeCorrection = $row->timecorrection;
			}
			$adjustedTimestamp = $lang->userAdjust( $timestamp, $timeCorrection );

			$date = $lang->date( $adjustedTimestamp );
			$time = $lang->time( $adjustedTimestamp );

			$params = array( $u->getName(), $t->subjectWithoutIncrement(),
							$date, $time, $talkPage, $permalink );

			// Get message in user's own language, bug 20645
			$msg = wfMsgReal( $msgName, $params, true /* use DB */, $langCode,
								true /*transform*/ );

			$to   = new MailAddress( $u );
			$subject = wfMsgReal( $subjectMsg, array( $threadSubject ), true /* use DB */,
									$langCode, true /* transform */ );

			UserMailer::send( $to, $from, $subject, $msg );
		}
	}

	static function newUserMessages( $user ) {
		$talkPage = new Article( $user->getUserPage()->getTalkPage() );

		$dbr = wfGetDB( DB_SLAVE );

		$joinConds = array( 'ums_user' => null );
		$joinConds[] = $dbr->makeList(
			array(
				'ums_user' => $user->getId(),
				'ums_thread=thread_id'
			),
			LIST_AND
		);
		$joinClause = $dbr->makeList( $joinConds, LIST_OR );

		$res = $dbr->select(
			array( 'thread', 'user_message_state' ),
			'*',
			array(
				'ums_read_timestamp' => null,
				Threads::articleClause( $talkPage )
			),
			__METHOD__,
			array(),
			array(
				'user_message_state' =>
				array( 'RIGHT JOIN', $joinClause )
			)
		);

		return Threads::loadFromResult( $res, $dbr );
	}

	static function newMessageCount( $user ) {
		global $wgMemc;

		$cval = $wgMemc->get( wfMemcKey( 'lqt-new-messages-count', $user->getId() ) );

		if ( $cval )
			return $cval;

		$dbr = wfGetDB( DB_SLAVE );

		$cond = array( 'ums_user' => $user->getId(), 'ums_read_timestamp' => null );
		$options = array( 'LIMIT' => 500 );

		$res = $dbr->select( 'user_message_state', '1', $cond, __METHOD__, $options );

		if( $res ) {
			$count = $res->numRows();

			if ( $count >= 500 ) {
				$count = $dbr->estimateRowCount( 'user_message_state', '*', $cond,
					__METHOD__ );
			}

			$wgMemc->set( wfMemcKey( 'lqt-new-messages-count', $user->getId() ),
				$count, 86400 );

			return $count;
		}
		return 0;
	}

	static function recacheMessageCount( $uid ) {
		global $wgMemc;

		$wgMemc->delete( wfMemcKey( 'lqt-new-messages-count', $uid ) );
		User::newFromId( $uid )->invalidateCache();
	}

	static function watchedThreadsForUser( $user ) {
		$talkPage = new Article( $user->getUserPage()->getTalkPage() );

		$dbr = wfGetDB( DB_SLAVE );

		$res = $dbr->select(
			array( 'thread', 'user_message_state' ),
			'*',
			array(
				'ums_read_timestamp' => null,
				'ums_user' => $user->getId(),
				'not (' . Threads::articleClause( $talkPage ) . ')',
			),
			__METHOD__,
			array(),
			array(
				'user_message_state' =>
				array( 'INNER JOIN', 'ums_thread=thread_id' ),
			)
		);

		return Threads::loadFromResult( $res, $dbr );
	}
}
