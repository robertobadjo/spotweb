<?php

class Dto_FormResult {
	private $_result;
	private $_fields;
	private $_errors;
	private $_warnings;
	private $_info;

	public function __construct($result = 'success') {
		$this->_setResult($result);
		$this->_fields = array();
		$this->_errors = array();
		$this->_warnings = array();
		$this->_info = array();
	} # ctor

	/*
	 * Set a specific result
	 */
	public function setResult($s) {
		$validResults = array('success' => true,
							  'warning' => true,
							  'failure' => true,
							  'notsubmitted' => true);

		if (isset($validResults[$s])) {
			throw new Exception("Invalid result (" . $s . ") chosen");
		} # if
	} # setResult

	/*
	 * Returns true when the form is in success
	 * state
	 */
	function isSuccess() {
		return $this->_result == 'success';
	} # isSuccess

	/*
	 * Returns the current result of this form
	 */
	function getResult($s) {
		return $this->_result;
	} # getResult

	/*
	 * Add an error to the list of errors
	 */
	public function addError($s) {
		if (empty($s)) {
			return ;
		} # if

		$this->setResult("failure");

		if (is_array($s)) {
			$this->_errors += $s;
		} else {
			$this->_errors[] = $s;
		} # else
	} # addError

	/*
	 * Add an info field to the list of infomessages
	 */
	public function addInfo($s) {
		if (empty($s)) {
			return ;
		} # if

		if (is_array($s)) {
			$this->_info += $s;
		} else {
			$this->_info[] = $s;
		} # else
	} # addInfo

	/*
	 * Add an warning filed to the list of warningmessages
	 */
	public function addWarning(s) {
		if (empty($s)) {
			return ;
		} # if

		$this->setResult("warning");

		if (is_array($s)) {
			$this->_warnings += $s;
		} else {
			$this->_warnings[] = $s;
		} # else
	} # addWarning

	/*
	 * add a data field to the result
	 */
	public function addData($field, $value) {
		$this->_data[$field] = $value;
	} # addData

	/*
	 * Return a list of data fields
	 */
	public function getData() {
		return $this->_data;
	} # getData

	/*
	 * Return a list of errors
	 */
	public function getErrors() {
		return $this->_errors;
	} # getErrors

	/*
	 * Return a list of info fields
	 */
	public function getInfo() {
		return $this->_info;
	} # getInfo

	/*
	 * Returns a list of warnings
	 */
	public function getWarnings() {
		return $this->_warnings;
	} # getWarnings

} # Dto_FormResult