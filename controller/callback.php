<?php
/**
* Tinge
*/
class Action extends Api {
	function index() {
		$type = $_GET['type'];
		if (method_exists('Action', $type)) {
			$this->$type();
		}
	}

	function sina() {
		$token = $this->sinaToken();
	}
}