<?php

class HomeController extends Controller {

	function __construct($controller, $action) {
		parent::__construct($controller, $action);
		
	}


	function index() {
		$this->render = 1;
		
		$this->_view->set('value', "testValue");
		//header("Location: " . BASEURL . "search/form");
	}

	function noviewaction() {

		$this->render = 0;
		
		echo "NoViewAction";
		//header("Location: " . BASEURL . "search/form");
	}
}