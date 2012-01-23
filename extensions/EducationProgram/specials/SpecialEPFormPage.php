<?php

/**
 * FormSpecialPage equivalent but deriving from SpecialEPPage.
 *
 * @since 0.1
 *
 * @file SpecialEPFormPage.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class SpecialEPFormPage extends SpecialEPPage {

	/**
	 * Instance of the object being edited or created.
	 *
	 * @since 0.1
	 * @var EPDBObject|false
	 */
	protected $item = false;

	/**
	 * Name of the class of the object being edited or created.
	 *
	 * @since 0.1
	 * @var string
	 */
	protected $itemClass;

	/**
	 * Name of the special page listing the items.
	 * For example, for "EditLolcat", it could be "Lolcats".
	 *
	 * @since 0.1
	 * @var string
	 */
	protected $listPage;

	/**
	 * Name of the special page displaying individual items.
	 * For example, for "EditLolcat", it could be "Lolcat".
	 *
	 * @since 0.1
	 * @var string
	 */
	protected $itemPage;

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 *
	 * @param string $name Name of the page
	 * @param string $right Right needed to access the page
	 * @param string $itemClass Name of the item class
	 * @param string $listPage Name of the page listing the items
	 * @param string $itemPage Name of the page displaying individual items
	 */
	public function __construct( $name, $right, $itemClass, $listPage, $itemPage ) {
		$this->itemClass = $itemClass;
		$this->listPage = $listPage;
		$this->itemPage = $itemPage;

		parent::__construct( $name, $right, false );

		$this->getOutput()->addModules( 'ep.formpage' );
	}

	/**
	 * @see SpecialPage::getDescription
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public function getDescription() {
		$action = $this->isNew() ? 'add' : 'edit';
		return wfMsg( 'special-' . strtolower( $this->getName() ) . '-' . $action );
	}

	/**
	 * Sets headers - this should be called from the execute() method of all derived classes!
	 *
	 * @since 0.1
	 */
	public function setHeaders() {
		$out = $this->getOutput();
		$out->setArticleRelated( false );
		$out->setRobotPolicy( 'noindex,nofollow' );
		$out->setPageTitle( $this->getDescription() );
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

		if ( $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'wpEditToken' ) ) ) {
			$this->showForm();
		}
		else {
			$this->showContent();
		}
	}

	/**
	 * Display the form and set the item field, or redirect the user.
	 *
	 * @since 0.1
	 */
	protected function showContent() {
		$c = $this->itemClass; // Yeah, this is needed in PHP 5.3 >_>

		if ( $this->isNew() ) {
			$data = $this->getNewData();

			$object = $c::selectRow( null, $data );

			if ( $object === false ) {
				$object = new $c( $data, true );
			}
			else {
				$this->showWarning( wfMessage( 'educationprogram-' . strtolower( $this->getName() ) . '-exists-already' ) );
			}
		}
		else {
			$object = $c::selectRow( null, $this->getTitleConditions() );
		}

		if ( $object === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( $this->listPage )->getLocalURL() );
		}
		else {
//			if ( !$this->isNew() ) {
//				$this->getOutput()->addHTML(
//					SpecialContestPage::getNavigation( $contest->getField( 'name' ), $this->getUser(), $this->getLanguage(), $this->getName() )
//				);
//			}

			$this->item = $object;
			$this->showForm();
		}
	}

	/**
	 * Returns if the page should work in insertion mode rather then modification mode.
	 *
	 * @since 0.1
	 *
	 * @return boolean
	 */
	protected function isNew() {
		static $isNew = null;

		if ( is_null( $isNew ) ) {
			$isNew = $this->getRequest()->wasPosted() &&
				( $this->getRequest()->getCheck( 'isnew' ) || $this->getRequest()->getCheck( 'wpisnew' ) );
		}

		return $isNew;
	}

	/**
	 * Show the form.
	 *
	 * @since 0.1
	 */
	protected function showForm() {
		$form = $this->getForm();

		if ( $this->getRequest()->wasPosted() && $this->getRequest()->getCheck( 'isnew' ) ) {
			$form->prepareForm();
			$form->displayForm( Status::newGood() );
		}
		else {
			if ( $form->show() ) {
				$this->onSuccess();
			}
		}
	}

	/**
	 * Returns the data to use as condition for selecting the object,
	 * or in case nothing matches the selection, the data to initialize
	 * it with. This is typically an identifier such as name or id.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected function getNewData() {
		return array( 'name' => $this->getRequest()->getVal( 'newname' ) );
	}

	/**
	 * Get the query conditions to obtain the item based on the page title.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected function getTitleConditions() {
		return array( 'name' => $this->subPage );
	}

	/**
	 * (non-PHPdoc)
	 * @see FormSpecialPage::getForm()
	 * @return HTMLForm|null
	 */
	protected function getForm() {
		$fields = $this->getFormFields();

		if ( $this->isNew() ) {
			$fields['isnew'] = array(
				'type' => 'hidden',
				'default' => 1,
			);
		}

		if ( $this->getRequest()->getCheck( 'wpreturnto' ) ) {
			$fields['returnto'] = array(
				'type' => 'hidden',
				'default' => $this->getRequest()->getText( 'wpreturnto' ),
			);
		}

		$form = new HTMLForm( $fields, $this->getContext() );

		$form->setSubmitCallback( array( $this, 'handleSubmission' ) );
		$form->setSubmitText( wfMsg( 'educationprogram-org-submit' ) );
		$form->setSubmitTooltip( 'ep-form-save' );

		$action = $this->isNew() ? 'add' : 'edit';
		$form->setWrapperLegend( $this->msg( strtolower( $this->getName() ) . '-' . $action . '-legend' ) );

		$form->addButton(
			'cancelEdit',
			wfMsg( 'cancel' ),
			'cancelEdit',
			array(
				'target-url' => SpecialPage::getTitleFor( $this->listPage )->getFullURL(),
			)
		);

//		$form->addButton(
//			'deleteEdit',
//			wfMsg( 'delete' ),
//			'deleteEdit'
//		);

		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see FormSpecialPage::getFormFields()
	 * @return array
	 */
	protected function getFormFields() {
		$fields = array();

		$fields['id'] = array( 'type' => 'hidden' );

		$req = $this->getRequest();

		// This sort of sucks as well. Meh, HTMLForm is odd.
		if ( $req->wasPosted()
			&& $this->getUser()->matchEditToken( $req->getVal( 'wpEditToken' ) )
			&& $req->getCheck( 'wpitem-id' ) ) {
			$fields['id']['default'] = $req->getInt( 'wpitem-id' );
		}

		return $fields;
	}

	/**
	 * Populates the form fields with the data of the item
	 * and prefixes their names.
	 *
	 * @since 0.1
	 *
	 * @param array $fields
	 *
	 * @return array
	 */
	protected function processFormFields( array $fields ) {
		if ( $this->item !== false ) {
			foreach ( $fields as $name => &$data ) {
				if ( !array_key_exists( 'default', $data ) ) {
					$data['default'] = $this->getDefaultFromItem( $this->item, $name );
				}
			}
		}

		$mappedFields = array();

		foreach ( $fields as $name => $field ) {
			if ( $this->getRequest()->getCheck( 'isnew' ) ) {
				// HTML form is being a huge pain in running the validation on post,
				// so just remove it if when not appropriate.
				unset( $field['validation-callback'] );
				unset( $field['required'] );
			}

			$mappedFields['item-' . $name] = $field;
		}

		return $mappedFields;
	}

	/**
	 * Gets the default value for a field from the item.
	 *
	 * @since 0.1
	 *
	 * @param EPDBObject $item
	 * @param string $name
	 *
	 * @return mixed
	 */
	protected function getDefaultFromItem( EPDBObject $item, $name ) {
		return $item->getField( $name );
	}

	/**
	 * Gets called after the form is saved.
	 *
	 * @since 0.1
	 */
	public function onSuccess() {
		if ( $this->getRequest()->getCheck( 'wpreturnto' ) ) {
			$parts = explode( '/', $this->getRequest()->getText( 'wpreturnto' ), 2 );
			$title = SpecialPage::getTitleFor( $parts[0], count( $parts ) === 2 ? $parts[1] : false )->getLocalURL();
		}
		else {
			$title = SpecialPage::getTitleFor( $this->itemPage, $this->subPage )->getLocalURL();
		}

		$this->getOutput()->redirect( $title );
	}

	/**
	 * Process the form.  At this point we know that the user passes all the criteria in
	 * userCanExecute().
	 *
	 * @param array $data
	 *
	 * @return Bool|Array
	 */
	public function handleSubmission( array $data ) {
		$fields = array();
		$unknownValues = array();

		$c = $this->itemClass; // Yeah, this is needed in PHP 5.3 >_>

		foreach ( $data as $name => $value ) {
			$matches = array();

			if ( preg_match( '/item-(.+)/', $name, $matches ) ) {
				if ( $matches[1] === 'id' && ( $value === '' || $value === '0' ) ) {
					$value = null;
				}

				if ( $c::canHasField( $matches[1] ) ) {
					$fields[$matches[1]] = $value;
				}
				else {
					$unknownValues[$matches[1]] = $value;
				}
			}
		}

		$keys = array_keys( $fields );
		$fields = array_combine( $keys, array_map( array( $this, 'handleKnownField' ), $keys, $fields ) );

		/* EPDBObject */ $item = new $c( $fields, is_null( $fields['id'] ) );

		foreach ( $unknownValues as $name => $value ) {
			$this->handleUnknownField( $item, $name, $value );
		}

		$success = $item->writeToDB();

		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}

	/**
	 * Gets called for evey unknown submitted value, so they can be dealt with if needed.
	 *
	 * @since 0.1
	 *
	 * @param EPDBObject $item
	 * @param string $name
	 * @param string $value This is a string, since it comes from request data, but might be a number or other type.
	 */
	protected function handleUnknownField( EPDBObject $item, $name, $value ) {
		// Override to use.
	}

	/**
	 * Gets called for evey known submitted value, so they can be dealt with if needed.
	 *
	 * @since 0.1
	 *
	 * @param string $name
	 * @param string $value This is a string, since it comes from request data, but might be a number or other type.
	 *
	 * @return mixed The new value
	 */
	protected function handleKnownField( $name, $value ) {
		// Override to use.
		return $value;
	}

}
