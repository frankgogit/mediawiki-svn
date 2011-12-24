<?php

/**
 * Class representing a single student.
 *
 * @since 0.1
 *
 * @file EPStudent.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPStudent extends EPDBObject {

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected static function getFieldTypes() {
		return array(
			'id' => 'id',
			'user_id' => 'id',
		);
	}
	
	/**
	 * Get the student object of a user, or false if there is none.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * @param string|array|null $fields
	 * 
	 * @return EPStudent|false
	 */
	public static function newFromUser( User $user, $fields = null ) {
		return self::selectRow( $fields, array( 'user_id' => $user->getId() ) );
	}
	
}
