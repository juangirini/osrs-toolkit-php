<?php

namespace opensrs\domains\provisioning\specialrequirements;

use OpenSRS\Base;
use OpenSRS\Exception;
/*
 *  Required object values:
 *  data - 
 */

class BE extends Base {
	protected $tld = 'be';
	protected $requiredFields = array(
		"lang",
		"owner_confirm_address"
		);

	public function __construct(){
		parent::__construct();
	}

	public function __deconstruct(){
		parent::__deconstruct();
	}

	public function meetsSpecialRequirements( $dataObject ){
		return $this->validateSpecialFields( $dataObject ) && !$this->needsSpecialRequirements( $dataObject );
	}

	public function validateSpecialFields( $dataObject ){
		// Make sure all required fields defined in
		// $this->requiredFields array are assigned
		// values
		foreach($this->requiredFields as $reqData) {
			if ($dataObject->data->$reqData == "") {
				throw new Exception( "oSRS Error - ". $reqData[$i] ." is not defined." );
			}
		}

		return true;
	}

	public function needsSpecialRequirements( $dataObject ){
		// returning true due to the original SWRegister class
		// throwing an exception for all domains that are NOT
		// .asia, .it, .eu or .de

		return true;
	}
}