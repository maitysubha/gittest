<?php

class SearchController extends Controller {

	private $memcache;
	
	function __construct($controller, $action) {
		parent::__construct($controller, $action);
		$this->memcache = new MemcacheHelper();
	}


	function index() {

		// $this->render = 0;

		// echo '<pre>';
		// print_r($_GET);
		// echo '</pre>';

		
		// $search_param = array();
		// $search_param['user']           = "redtag";
		// $search_param['origin']         = "YYZ";
		// $search_param['destination']    = "LHR";//"PUJ";
		// $search_param['departure']      = "2014-12-05";
		// $search_param['return']         = "2014-12-12";
		// $search_param['adults']         = 1;
		// $search_param['child']          = 0;
		// $search_param['infant']         = 0;
		// $search_param['passengers']     = $search_param['adults']+$search_param['child'];
		// $search_param['type']           = "tripOptions";
		// $search_param['fare']           = "ALL";
		// $search_param['airline']        = "ALL";
		// $search_param['oneway']         = false;
		// $search_param['nearbyAirports'] = true;
		// $search_param['ages'] = array();
		// $search_param['remoteIP'] = $_SERVER['REMOTE_ADDR'];
		
		// echo '<pre>';
		// print_r($search_param);
		// echo '</pre>';

		$uid = uniqid("UID", true);

		$search_param = array();
		$search_param['user']           = "redtag";
		$search_param['origin']         = strtoupper($_GET['originCode']);
		$search_param['destination']    = strtoupper($_GET['destinationCode']);
		$search_param['departure']      = $_GET['departure'];
		$search_param['return']         = isset($_GET['return'])?$_GET['return']:false;
		$search_param['adults']         = $_GET['adults'];
		$search_param['child']          = $_GET['children'];
		$search_param['infant']         = 0;
		$search_param['passengers']     = $search_param['adults']+$search_param['child'];
		$search_param['type']           = "tripOptions";
		$search_param['fare']           = "ALL";
		$search_param['airline']        = "ALL";
		$search_param['oneway']         = ($_GET['trip']=='oneway')?true:false;
		$search_param['nearbyAirports'] = true;
		$search_param['ages'] = isset($_GET['ages'])?$_GET['ages']:array();
		$search_param['remoteIP'] = $_SERVER['REMOTE_ADDR'];
		$search_param['dev'] = DEVELOPMENT_ENVIRONMENT;
		$search_param['uid'] = $uid;




		// echo '<pre>';
		// print_r($search_param);
		// echo '</pre>';



		$config = load_config('flights');

		$flights = new Flights($config);



		$results = $flights->search($search_param);
		$results = json_decode($results, true);
		if(isset($results['error'])){

			$this->render = 0;

			$id = uniqid("ER|", true);
			$this->memcache->set($id, json_encode($results));

			header("Location: ". BASEURL . "error?id=" . $id);
			die();
		}

		



		if ((!$search_param['oneway']) && (
			(strtotime($search_param['return']) - strtotime($search_param['departure'])) >= 259200) && 
			($search_param['passengers'] == 1 &&  $search_param['adults'] == 1)) {


			$price = floor($results['tripOptions']['rows'][0]['cells'][0]['solution']['saleTotal']['amount']); 
			$slice = $results['tripOptions']['rows'][0]['itinerary']['slices'][0];
			$start_segment = $slice['segments'][0];
			$end_segment = $slice['segments'][count($slice['segments'])-1];




			$departureDate = strtotime($search_param['departure']);
            $departureDate = date("Y-m-d", $departureDate);
            $returnDate = strtotime($search_param['return'] );
            $returnDate = date("Y-m-d", $returnDate);  
            $updated = date('Y-m-d H:i:s', strtotime("now"));

            $departureCode = $start_segment['origin'];
            $departure = $results['data']['cities'][$departureCode]['city'];
            $destinationCode = $end_segment['destination'];
            $destination = $results['data']['cities'][$destinationCode]['city'];
			
			// echo '<pre>';
			// print_r($departure);
			// echo '</pre>';

			// echo '<pre>';
			// print_r($destination);
			// echo '</pre>';

			$config = load_config('db406720');
			$db406720 = new Database($config['hostname'], $config['database'], $config['username'], $config['password']);

			$query = "	SELECT id, price, departureDate, returnDate, updated 
						FROM flightSpecials 
						WHERE departureCode = '$departureCode' 
							AND destinationCode = '$destinationCode' 
							AND departureDate = '$departureDate' 
							AND returnDate = '$returnDate'";
			$result = $db406720->query($query);

			// echo '<pre>';
			// print_r($result);
			// echo '</pre>';

			if (count($result) == 0) {
				$query = "INSERT INTO flightSpecials (departure, departureCode, destination, destinationCode, departureDate, returnDate, price, updated) VALUES ('$departure', '$departureCode', '$destination', '$destinationCode', '$departureDate', '$returnDate', '$price', '$updated')";
			}
			else{
				$id = $result[0]['id'];
				$query = "UPDATE flightSpecials SET price = '$price', updated = '$updated'  WHERE id = '$id'";
			}
			$db406720->query($query);
		}

		

		// echo '<pre>';
		// print_r($results['data']['filters']);
		// echo '</pre>';

		// echo '<pre>';
		// print_r($results['data']);
		// echo '</pre>';

		$helper = new FlightHelper();

		$this->_view->set('helper', $helper);
		$this->_view->set('searchForm', $search_param);
		$this->_view->set('searchengineForm', $_GET);

		

		$this->_view->set('results', $results['tripOptions']);
		$this->_view->set('data', $results['data']);
		$this->_view->set('matrix', $results['matrix']);

		$this->_view->set('resultId', $results['id']);
		$this->_view->set('uid', $uid);

	}
}