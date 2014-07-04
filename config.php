<?php 

namespace natpoint;

/**
* Minimum abstaction Crowdtilt API Wrapper
*
* @author Nathan Pointer <nwpointer@gmail.com>
* @version 1.1.1
*
**/

class crowdtilt{
	private 
		$api_url='https://api-sandbox.crowdtilt.com/v1';
		$api_key='554cac7c0efff25d8784e712b0c274';
		$secret='70499e57a674ea547868ffcc520564ece919481e';
		
	function curl_connect($resource=""){
		extract(self::$conection_details);

		$ch = curl_init();

		$defaults = [
			CURLOPT_USERPWD => "$key:$secret",
			CURLOPT_URL => "$api_url/$resource",
			CURLOPT_RETURNTRANSFER => 1
		];
		curl_setopt_array($ch, $defaults); 
		return $ch;
	}

	function get_resource($resource, $format='array'){
		
		$ch = self::curl_connect($resource);

		// fetch the resulting output and free up the handle
		$output = curl_exec($ch);
		curl_close($ch);


		// format the output
		if($format = 'array'){
			$output = json_decode($output, JSON_PRETTY_PRINT);
		}

		// return data or error message 
		if ($output) {
		    return $output;
		}else{
			return "cURL Error: " . curl_error($ch);
		}
	}

	static function post_resource($resource, $data, $format='array'){
		$data_string = json_encode($data);

		$ch = self::curl_connect($resource);
		

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);  

		$output = curl_exec($ch);
		curl_close($ch);

		// format the output
		if($format = 'array'){
			$output = json_decode($output, JSON_PRETTY_PRINT);
		}

		// return data or error message 
		if ($output) {
		    return $output;
		}else{
			return "cURL Error: " . curl_error($ch);
		}
	}

	static function put_resource($resoure, $data){

	}

	static function delete_resource($resoure, $data){

	}
}

class User extends crowdtilt{
	public static function find($id){
		return self::get_resource("users/$id");
	}
	public static function save($data){

	}
	public static function all(){
		return self::get_resource("users");
	}
	public static function campaigns($id){
		return self::get_resource("users/$id/campaigns");
	}
}

function prettyPrint($data){
	print("<pre>".print_r($data,true)."</pre>");
}