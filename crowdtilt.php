<?php 

class Crowdtilt
{
	private $account_details;
	private $curl_defaults = [
		'get'=>[
			CURLOPT_RETURNTRANSFER => true
		],
		'post'=>[
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FRESH_CONNECT => true, 
			CURLOPT_FORBID_REUSE => true, 
			CURLOPT_TIMEOUT => 10,
		],
		'put'=>[
			CURLOPT_CUSTOMREQUEST, "PUT",
			CURLOPT_RETURNTRANSFER => true
		],
		'delete'=>[
			CURLOPT_CUSTOMREQUEST, "DELETE", 
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER=> false,
			CURLOPT_TIMEOUT => 4,
		]
	];

	function __construct($account_details){
		$this->account_details = $account_details;
	}

	// methods get, post, put and delete are serviced by __call()
	function __call($method, $args){
		
		// looks up curl defaults for request type 
		if(array_key_exists($method, $this->curl_defaults)){
			$curl_settings = ($this->curl_defaults[$method]);
		}

		// add data to request
		if($args[1]){ 
			// $data = json_encode($args[1]);
			$curl_settings += [
				CURLOPT_POSTFIELDS => $data,
				CURLOPT_HTTPHEADER => [
				    'Content-Type: application/json',                                                                                
				    'Content-Length: ' . strlen($data)                                                                      
				]
			];
		} 
		// override  curl_defaults if there are any passed to method __call()
		if($args[2]){ $curl_settings += $args[2];}
		
		return $this->request($args[0], $curl_settings, json_encode($args[1]));

	}

	public function request($resource, $curl_settings, $data){
		extract($this->account_details);
		$ch = curl_init();

		// authenticate
		curl_setopt($ch, CURLOPT_USERPWD, "$api_key:$secret");

		// set api endpoint
		curl_setopt($ch,CURLOPT_URL, "$api_url/$resource");


		// apply curl settings we built up from arguments in __call()
		curl_setopt_array($ch, $curl_settings);

		// execute request
		$result = curl_exec($ch);
		return $result;
	}

	// public function connect($type, $resource, $options=[], $data=[]){
	// 	$ch = curl_init();

	// 	// authenticate
	// 	curl_setopt($ch, CURLOPT_USERPWD, "$this->api_key:$this->secret");

	// 	//return the transfer as a string 
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// 	return $ch;
	// }

	// public function post($resource, $data, $options=[]){
	// 	$ch = $this->connect();

	// 	// set url & other options
	// 	$defaults = [
	// 		CURLOPT_POST => 1, 
	// 		CURLOPT_HEADER => 0, 
	// 		CURLOPT_URL => "$this->api_url/$resource", 
	// 		CURLOPT_FRESH_CONNECT => 1, 
	// 		CURLOPT_RETURNTRANSFER => 1, 
	// 		CURLOPT_FORBID_REUSE => 1, 
	// 		CURLOPT_TIMEOUT => 4, 
	// 		CURLOPT_POSTFIELDS => http_build_query($data)
	// 	];
	// 	curl_setopt_array($ch, ($options + $defaults));
	// 	$output = curl_exec($ch);

	// 	return $output;
	// }

	// public function get($resource, $options=[]){
	// 	$ch = $this->connect();

	// 	// set url & other options
 //        curl_setopt($ch, CURLOPT_URL, "$this->api_url/$resource");
 //        curl_setopt_array($ch, ($options));

 //        // $output contains the output string 
 //        $output = curl_exec($ch); 

 //        // close curl resource to free up system resources 
 //        curl_close($ch);

 //        $output =  $this->validate($output);

	// 	return $output;
	// }

	






	// public function(){
		
	// function curl_connect($resource=""){
	// 	extract(self::$conection_details);

	// 	$ch = curl_init();

	// 	$defaults = [
	// 		CURLOPT_USERPWD => "$key:$secret",
	// 		CURLOPT_URL => "$api_url/$resource",
	// 		CURLOPT_RETURNTRANSFER => 1
	// 	];
	// 	curl_setopt_array($ch, $defaults); 
	// 	return $ch;
	// }

	// function get_resource($resource, $format='array'){
		
	// 	$ch = self::curl_connect($resource);

	// 	// fetch the resulting output and free up the handle
	// 	$output = curl_exec($ch);
	// 	curl_close($ch);


	// 	// format the output
	// 	if($format = 'array'){
	// 		$output = json_decode($output, JSON_PRETTY_PRINT);
	// 	}

	// 	// return data or error message 
	// 	if ($output) {
	// 	    return $output;
	// 	}else{
	// 		return "cURL Error: " . curl_error($ch);
	// 	}
	// }

	// static function post_resource($resource, $data, $format='array'){
	// 	$data_string = json_encode($data);

	// 	$ch = self::curl_connect($resource);
		

	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	// 	    'Content-Type: application/json',                                                                                
	// 	    'Content-Length: ' . strlen($data_string))                                                                       
	// 	);  

	// 	$output = curl_exec($ch);
	// 	curl_close($ch);

	// 	// format the output
	// 	if($format = 'array'){
	// 		$output = json_decode($output, JSON_PRETTY_PRINT);
	// 	}

	// 	// return data or error message 
	// 	if ($output) {
	// 	    return $output;
	// 	}else{
	// 		return "cURL Error: " . curl_error($ch);
	// 	}
	// }

	// static function put_resource($resoure, $data){

	// }

	// static function delete_resource($resoure, $data){

	// }
}

// class User extends crowdtilt{
// 	public static function find($id){
// 		return self::get_resource("users/$id");
// 	}
// 	public static function save($data){

// 	}
// 	public static function all(){
// 		return self::get_resource("users");
// 	}
// 	public static function campaigns($id){
// 		return self::get_resource("users/$id/campaigns");
// 	}
// }

// function prettyPrint($data){
// 	print("<pre>".print_r($data,true)."</pre>");
// }