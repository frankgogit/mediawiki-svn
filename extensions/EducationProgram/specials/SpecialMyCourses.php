<?php

/**
 * Special page listing the courses relevant to the current user.
 * There are the courses the user is either enrolled in, an ambassador for or instructor for.
 * When a subpage param is provided, and it's a valid course
 * name, info for that course is shown.
 *
 * @since 0.1
 *
 * @file SpecialMyCourses.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialMyCourses extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'MyCourses' );
	}

	/**
	 * Main method.
	 *
	 * @since 0.1
	 *
	 * @param string $subPage
	 */
	public function execute( $subPage ) {
		parent::execute( $subPage );

		if ( $this->getUser()->isLoggedIn() ) {
			if ( $this->getUser()->isAllowed( 'ep-org' ) ) {
				$this->displayNavigation();
			}
			
			if ( $this->subPage === '' ) {
				$this->displayCourses();
			}
			else {
				$course = EPCourses::singleton()->selectRow( null, array( 'name' => $this->subPage ) );
				
				if ( $course === false ) {
					// TODO
				}
				else {
					$this->displayCourse( $course );
				}
			}		
		}
		else {
			$this->getOutput()->addHTML( Linker::linkKnown(
				SpecialPage::getTitleFor( 'Userlogin' ),
				wfMsgHtml( 'ep-mycourses-login-first' ),
				array(),
				array(
					'returnto' => $this->getTitle( $this->subPage )->getFullText()
				)
			) );
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see SpecialEPPage::getDefaultNavigationItems()
	 */
	protected function getDefaultNavigationItems() {
		$items = parent::getDefaultNavigationItems();
		
		if ( $this->subPage === '' ) {
			unset( $items[wfMsg( 'ep-nav-mycourses' )] );			
		}
		
		return $items;
	}

	/**
	 * Display the courses relevant to the current user.
	 *
	 * @since 0.1
	 */
	protected function displayCourses() {
		$this->displayEnrollment();
		
		if ( $this->getUser()->isAllowed( 'ep-instructor' ) ) {
			$this->displayRoleAssociation( 'EPInstructor' );
		}
		
		if ( $this->getUser()->isAllowed( 'ep-online' ) ) {
			$this->displayRoleAssociation( 'EPOA' );
		}
		
		if ( $this->getUser()->isAllowed( 'ep-campus' ) ) {
			$this->displayRoleAssociation( 'EPCA' );
		}
	}

	/**
	 * Display the courses the user is enrolled in (if any).
	 *
	 * @since 0.1
	 */
	protected function displayEnrollment() {
		if ( $this->getRequest()->getCheck( 'enrolled' ) ) {
			EPStudents::singleton()->setReadDb( DB_MASTER );
		}

		$student = EPStudent::newFromUser( $this->getUser() );

		$courses = $student->getCourses( 'id' );
		
		$courseIds = array_map(
			function( EPCourse $course ) {
				return $course->getId();
			},
			$courses
		);
		
		if ( $this->getRequest()->getCheck( 'enrolled' ) && in_array( $this->getRequest()->getInt( 'enrolled' ), $courseIds ) ) {
			$course = EPCourses::singleton()->selectRow(
				array( 'name', 'org_id' ),
				array( 'id' => $this->getRequest()->getInt( 'enrolled' ) )
			);
			
			$this->showSuccess( wfMessage(
				'ep-mycourses-enrolled',
				$course->getField( 'name' ),
				$course->getOrg()->getField( 'name' )
			) );
		}
		
		if ( count( $courseIds ) === 1 ) {
			$course = $courses[0];
			$course->loadFields();
			$this->displayCourse( $course );
		}
		elseif ( count( $courseIds ) > 1 ) {
			$this->getOutput()->addElement( 'h2', array(), wfMsg( 'ep-mycourses-enrollment' ) );
			EPCourse::displayPager( $this->getContext(), array( 'id' => $courseIds ), true, 'enrollment' );
		}
	}

	/**
	 * Display the courses the current user is associated with in the role
	 * of which the class name is provided.
	 *
	 * @since 0.1
	 *
	 * @param $class The name of the EPIRole implementing class
	 */
	protected function displayRoleAssociation( $class ) {
		$ambassador = $class::newFromUser( $this->getUser() );
		$courses = $ambassador->getCourses( array( 'id', 'name' ) );

		if ( count( $courses ) > 0 ) {
			$this->getOutput()->addElement( 'h2', array(), wfMsg( 'ep-mycourses-courses-' . strtolower( $class ) ) );

			if ( $class == 'EPInstructor' ) {
				$this->displayCourseTables( $courses );
			}
			else {
				$courseIds = array_map(
					function( EPCourse $course ) {
						return $course->getId();
					},
					$courses
				);

				EPCourse::displayPager( $this->getContext(), array( 'id' => $courseIds ), true, $class );
			}
		}
		else {
			$this->getOutput()->addWikiMsg( 'ep-mycourses-nocourses-' . strtolower( $class ) );
		}
	}

	/**
	 * Display a list of courses, each as a h3 section with the student/article table in it.
	 *
	 * @param array $courses
	 */
	protected function displayCourseTables( array $courses ) {
		$out = $this->getOutput();

		foreach ( $courses as /* EPCourse */ $course ) {
			$out->addElement( 'h3', array(), $course->getField( 'name' ) );

			$pager = new EPArticleTable(
				$this->getContext(),
				array( 'id' => $this->getUser()->getId() ),
				array( 'course_id' => $course->getId() )
			);

			if ( $pager->getNumRows() ) {
				$out->addHTML(
					$pager->getFilterControl() .
						$pager->getNavigationBar() .
						$pager->getBody() .
						$pager->getNavigationBar() .
						$pager->getMultipleItemControl()
				);
			}
		}
	}

	/**
	 * Display enrollment info for a single course.
	 *
	 * @since 0.1
	 *
	 * @param EPCourse $course
	 */
	protected function displayCourse( EPCourse $course ) {
		$out = $this->getOutput();
		
		$out->addElement( 'h2', array(), wfMsg( 'ep-mycourses-course-enrollment' ) );
		
		$out->addHTML( $this->msg(
			'ep-mycourses-enrolledin',
			array(
				Message::rawParam( $course->getLink() ),
				Message::rawParam( $course->getOrg()->getLink() )
			)
		)->text() );

		$out->addWikiMsg( 'ep-mycourses-articletable' );

		$pager = new EPArticleTable(
			$this->getContext(),
			array( 'id' => $this->getUser()->getId() ),
			array(
				'course_id' => $course->getId(),
				'user_id' => $this->getUser()->getId(),
			)
		);

		$pager->setShowStudents( false );

		if ( $pager->getNumRows() ) {
			$out->addHTML(
				$pager->getFilterControl() .
					$pager->getNavigationBar() .
					$pager->getBody() .
					$pager->getNavigationBar() .
					$pager->getMultipleItemControl()
			);
		}
	}

}
