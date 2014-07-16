<?php


/*

// autoload classes required OR use COMPOSER to autoload classes,

////////////////////////////////////////////////////////////////////////////////////////////////////
function autoloadFunction($className){

	// autoloader implementation to load library classes
	$file = $className;
	
    return include dirname(__FILE__) . "/$file.php";
}

spl_autoload_register("autoloadFunction");

////////////////////////////////////////////////////////////////////////////////////////////////////


// if composer used
require "vendor/autoload.php"



*/



class Startrek {


	private $config;


	function __construct($config) {
		$this->config =  $config;
	

	}



	function search($search_param) {


		$passengerCount = array();
		$passengerCount['ADT'] = $search_param['adults'];

		if(isset($search_param['ages'])){

			if(count($search_param['ages']) != $search_param['child']){
				$error = array();
				$error['code'] = '003B';
				$error['type'] = 'Input';
				$error['short_description'] = 'Ages doesn\'t match number of kids.';
				$error['long_description'] = "Ages doesn't match number of children.";
				$error['request'] = json_encode($search_param);
				$error['response'] = '';

				$results = array();
				$results['error'] = $error;
				return json_encode($results);
				die();
			}
			
			for($i=0;$i<$search_param['child'];$i++){
				$pax_str = 'C'.$this->child_age_pad($search_param['ages'][$i]);
				if( isset($passengerCount[$pax_str]) ){
					$passengerCount[$pax_str]++;
				}else {
					$passengerCount[$pax_str] = 1;
				}
			}

			$search_param['infant'] = 0;
			foreach ($search_param['ages'] as $age) {
				if($age<2) $search_param['infant']++;
			}
			$search_param['child'] -= $search_param['infant'];
		}
		else{
			$search_param['ages'] = false;
		}

		$search_param['passengerCount'] = $passengerCount;


		if ($search_param['destination'] == $search_param['origin']) {

			$error = array();
			$error['code'] = '001C';
			$error['type'] = 'Input';
			$error['short_description'] = 'Location';
			$error['long_description'] = 'Destination and origin can not be the same.';
			$error['request'] = json_encode($search_param);
			$error['response'] = '';

			$results = array();
			$results['error'] = $error;
			return json_encode($results);
			die();
		}

		// Check that the departure is at least 2 days in advance
		$departure_time = strtotime($search_param['departure']);
		$return_time = strtotime($search_param['return']);
		$earliest = strtotime("+1 days");
		$allowed = strtotime("+2 days");
		if ($departure_time < $earliest) {
			$allowed = date("l, F d, Y", $allowed);

			$error = array();
			$error['code'] = '002A';
			$error['type'] = 'Input';
			$error['short_description'] = 'Duration';
			$error['long_description'] = "Earliest allowed departure is $allowed";
			$error['request'] = json_encode($search_param);
			$error['response'] = '';

			$results = array();
			$results['error'] = $error;
			return json_encode($results);
			die();
		}

		if (($return_time < $departure_time) && !$search_param['oneway']) {

			$error = array();
			$error['code'] = '002B';
			$error['type'] = 'Input';
			$error['short_description'] = 'Duration';
			$error['long_description'] = "Return time can not be less than departure time.";
			$error['request'] = json_encode($search_param);
			$error['response'] = '';

			$results = array();
			$results['error'] = $error;
			return json_encode($results);
			die();
		}

		if($search_param['infant'] > $search_param['adults']){

			$error = array();
			$error['code'] = '003A';
			$error['type'] = 'Input';
			$error['short_description'] = 'Passenger';
			$error['long_description'] = "Number of infant is greater than number of adults";
			$error['request'] = json_encode($search_param);
			$error['response'] = '';

			$results = array();
			$results['error'] = $error;
			return json_encode($results);
			die();
		}

		require "startrek/Search.php";
		$sSearch = new Search($this->config);

		$request = $sSearch->generateSourceRequest($search_param);

		// make Curl request here

		// 


		

		return $results;
	}











}