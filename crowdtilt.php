<?php

class Crowdtilt{

	/** 
	* Send a POST requst using cURL 
	* @param string $url to request 
	* @param array $post values to send 
	* @param array $options for cURL 
	* @return string 
	*/ 
	public function post($resource, array $data = NULL, array $options = array()) 
	{ 
		extract(self::$conection_details);

		$defaults=>[
			CURLOPT_POST => 1, 
			CURLOPT_HEADER => 0, 
			CURLOPT_URL => "$url/$resource", 
			CURLOPT_FRESH_CONNECT => 1, 
			CURLOPT_RETURNTRANSFER => 1, 
			CURLOPT_FORBID_REUSE => 1, 
			CURLOPT_TIMEOUT => 4, 
			CURLOPT_POSTFIELDS => http_build_query($post)
		],

		$result = execute();
		return $result; 	
	} 

	/** 
	* Send a GET requst using cURL 
	* @param string $url to request 
	* @param array $get values to send 
	* @param array $options for cURL 
	* @return string 
	*/ 
	public function get($resource, array $options = array()) 
	{   
		extract(self::$conection_details);
		$defaults=>[
		    CURLOPT_URL => $url, 
		    CURLOPT_HEADER => 0, 
		    CURLOPT_RETURNTRANSFER => TRUE, 
		    CURLOPT_TIMEOUT => 4 
	    ] 
		$data_string = json_encode($data);
	    
	    $ch = curl_init(); 
	    curl_setopt_array($ch, ($options + $defaults)); 
	    if( ! $result = curl_exec($ch)) 
	    { 
	        trigger_error(curl_error($ch)); 
	    } 
	    curl_close($ch); 
	    return $result; 
	}
	private static function execute(){
		$ch = curl_init(); 
		curl_setopt_array($ch, ($options + $defaults)); 
		if( ! $result = curl_exec($ch)) 
		{ 
		    trigger_error(curl_error($ch)); 
		} 
		curl_close($ch);
		return $result; 
	} 
}