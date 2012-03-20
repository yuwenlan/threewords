<?php
/**
* Tinge
*/
class Action extends Api {
	function index() {
		$_SESSION = array();
		session_destroy();
		$this->redirect("?url=index");
	}
}