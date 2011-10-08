<?php

/**
 * Contest form field validation tests cases.
 *
 * @ingroup Contest
 * @since 0.1
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ContestValidationTests extends MediaWikiTestCase {

	/**
	 * Tests 
	 */
	public function testURLValidation() {
		$tests = array(
			'https://github.com/JeroenDeDauw/smwcon/tree/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53b' => true,
			'https://github.com/Jeroen-De-Dauw42/smwcon_-42/tree/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53b' => true,
			'https://github.com/JeroenDeDauw$/smwcon/tree/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53b' => false,
			'https://github.com/JeroenDeDauw/smwcon/tree3/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53b' => false,
			'https://github.com/JeroenDeDauw/smwcon/tree/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53' => false,
			'https://github.com/JeroenDeDauw/smwcon/tree/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53ba' => false,
			'https://github.com/JeroenDeDauw/smwc*/tree/f9b26ec4ba1101b1f5d4ef76b7ae6ad3dabfb53b' => false,
		);
		
		foreach ( $tests as $test => $isValdid ) {
			if ( $isValdid ) {
				$this->assertEquals( true, SpecialContestSubmission::validateSubmissionField( $test ) );
			}
			else {
				$this->assertFalse( SpecialContestSubmission::validateSubmissionField( $test ) === true );
			}
		}
	}

}
