<?php

class ErrorController extends Controller {

	private $memcache;

	function __construct($controller, $action) {
		parent::__construct($controller, $action);

		$this->memcache = new MemcacheHelper();
	}


	function index() {
		
		//$this->render = 0;
		//echo "Error";

		$results = $this->memcache->get($_GET['id']);

		$results = json_decode($results, true);
		if(!isset($results['request'])) $results['request'] = '';
		if(!isset($results['response'])) $results['response'] = '';
		// echo '<pre>';
		// print_r(($results));
		// echo '</pre>';
		$this->_model->logerror($results['error']);

		$this->_view->set('results', $results);
	}


	function geterror($id){

		$results = $this->memcache->get($id);
		// echo '<pre>';
		// print_r(($results));
		// echo '</pre>';

		$results = json_decode($results, true);
		// echo '<pre>';
		// print_r(($results));
		// echo '</pre>';
		$this->_model->logerror($results['error']);

		$this->_view->set('results', $results);
	}



	


}