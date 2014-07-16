<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) exit('No direct access allowed.');

class FlightHelper {
	
	// 2012-09-08T08:10-05:00 = 8:10am
	public function convertToTime($time, $long = true) {
		//if ($long) $time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("g:i a", $time);
		
		return $time;
	}
	
	public function convertToDate($time, $long = true) {
		//if ($long) $time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("F j", $time);
		
		return $time;
	}

	public function convertToLongDate($time, $long = true){
		//if ($long) $time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("l, F j, Y", $time);
		
		return $time;
	}


	public function convertToLongDateTime($time, $long = true) {
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("D, F j, Y g:i a", $time);
		
		return $time;
	}

	public function convertToYMD($time, $long = true){
		//if ($long) $time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("Y-m-d", $time);
		
		return $time;
	}

	public function convertToItineraryTime($time, $long = true) {
		//if ($long) $time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("g:i a", $time);
		
		return $time;
	}

	public function removeTimeZoneOffset($time) {
		//$time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		
		return $time;
	}

	public function convertToItineraryDate($time, $long = true) {
		//if ($long) $time = substr($time, 0, -6);
		if ($long) {
			$tmp = explode('T', $time);
			$tmp[1] = substr($tmp[1], 0, 5);
			$time = $tmp[0].'T'.$tmp[1];
		}
		$time = strtotime($time);
		$time = date("D M j", $time);
		
		return $time;
	}

	public function getStops($row) {
		$stops = array();
		foreach ($row->slice->segments as $segment) {
			foreach ($segment->legs as $leg) {
				$destination = $leg->destination;
				$stops[] = $destination;
			}
		}
		array_pop($stops);      
		return $stops;
	}
	
	public function convertToMoney($money) {
		$money = floor($money);
		return "$" . number_format($money, 0, '.', '');
	}
	
	public function convertToDuration($duration) {
		$hours = floor($duration / 60);
		$minutes = $duration - ($hours * 60);
		return $hours . "h" . " " . $minutes . "m";
	}
	
	public function simpleMoney($money){
		$length = count($money);
		$money = substr($money, 0, -3);
		return $money;
	}
	
	public function convertToMatrixStopCount($number) {
		if ($number == "0") return "Non-stop";
		elseif ($number == "1") return $number . " Stop";
		else return $number . " Stops";
	}

	public function convertToMatrixPrice($number) {
		return "$" . number_format($number, 0, '.', '');
	}
	
	public function convertToStopCount($stops) {
		if ($stops == 0) return "Non-stop";
		elseif ($stops == 1) return "1 Stop";
		else return $stops . " Stops";
	}

	public function getStopCount($row) {
		$stopCount = 0;
		foreach ($row->slice->segments as $segment) {
			foreach ($segment->legs as $leg) {
				$stopCount++;
			}
		}
		$stopCount--;
		return $stopCount;
	}

	public function removeCAD($price) {
		return substr($price, 3);
	}

	public function child_age_pad($age) {
		$n = 0;
		if($age<10) $n=2;
	
		return str_pad((int) $age,$n,"0",STR_PAD_LEFT);
	}

	function showTwoDecimal($number) {
		if (is_string($number)) {
			$number = floatval($number);
		}
		$number = number_format($number,2,'.','');
		return $number;
	}


	



	
	function decrypt($data){

		$key = "ehY18p;4>_)F";            
		# Opens the module of the algorithm and the mode to be used
		$algorithm = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '','cfb', '');
		
		$iv_size = mcrypt_enc_get_iv_size($algorithm);              // Returns the size of the IV of the opened algorithm
		$data = base64_decode($data);                               // Decodes data encoded with MIME base64
		$iv = substr($data,0,$iv_size);                             // Return part of a string
		$data = substr($data,$iv_size);
		
		$key = md5($key);                                           // Calculate the md5 hash of a string
		$key = substr($key, 0, mcrypt_enc_get_key_size($algorithm));// Returns the maximum supported keysize of the opened mode
		
		if (mcrypt_generic_init($algorithm, $key, $iv) === 0){      // This function initializes all buffers needed for encryption
			
			$decryptedtext = mdecrypt_generic($algorithm, $data);   // Decrypt data
			mcrypt_generic_deinit($algorithm);                      // This function deinitializes an encryption module
			mcrypt_module_close($algorithm);                        // Close the mcrypt module
			return $decryptedtext;
		}
		
		return $data;
	}
	
	function encrypt($data) {
		
		$key = "ehY18p;4>_)F"; 
		
		# Opens the module of the algorithm and the mode to be used
		$algorithm = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '','cfb', '');
		
		$iv_size = mcrypt_enc_get_iv_size($algorithm);              // Returns the size of the IV of the opened algorithm
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);              // Create an initialization vector (IV) from a random source
		
		$key = md5($key);                                           // Calculate the md5 hash of a string
		$key = substr($key, 0, mcrypt_enc_get_key_size($algorithm));// Returns the maximum supported keysize of the opened mode
		
		if (mcrypt_generic_init($algorithm, $key, $iv) === 0){      // This function initializes all buffers needed for encryption

			$encryptedtext = mcrypt_generic($algorithm, $data);     // This function encrypts data
			mcrypt_generic_deinit($algorithm);                      // This function deinitializes an encryption module
			mcrypt_module_close($algorithm);                        // Close the mcrypt module
			$encryptedtext = $iv.$encryptedtext;
			return base64_encode($encryptedtext);                   // Encodes data with MIME base64
		}
		
		return $data;
	}



	function find_age($date) {
		
		return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
	}


	
	function accentToRegular($str){
		
		//echo $str."<br/>";
		$accentCharacters = "ÀÂÄÈÉÊËÎÏÔÙÛÜŸàâäèéêëîïôùûüÿ";
		$normalChracters = "AAAEEEEIIOUUUYaaaeeeeiiouuuy";
		
		$convertedstr = strtr(utf8_decode($str) ,$accentCharacters, $normalChracters);
		$convertedstr = preg_replace("/[^a-zA-Z0-9\s]/", " ", $convertedstr); //preg_replace("/[^a-zA-Z\s]/", " ", $convertedstr);
		//echo $convertedstr."<br/>";
		return $convertedstr;
	}



	function sendEmail($from,$to, $message,$subject) {
	
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: $from";
		$send = mail($to,$subject,$message,$headers,"-f bounce@redtag.ca");
		if ($send) {
			return true;
		}
		else {
			return false;
		}
	}







}