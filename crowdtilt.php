 <?PHP

class Crowdtilt
{
	private $account_details;
	private $curl_defaults = [
		CURLOPT_HTTPHEADER => ['Content-type: application/json'],
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 10
	];

	function __construct($account_details)
	{
		// these values are extracted() in request()
		$this->account_details = $account_details; 
	}

	// methods get, post, put and delete are serviced by __call()
	function __call($method, $args)
	{	
		$method = strtoupper($method);
		$curl_settings = $this->curl_defaults += [CURLOPT_CUSTOMREQUEST => $method];

		return $this->request($args[0], $args[1], $curl_settings, $method);
	}

	function request($resource, $data=[], $curl_settings)
	{
		extract($this->account_details);
	  	$ch = curl_init();

	    // authenticate
	    curl_setopt($ch, CURLOPT_USERPWD, "$api_key:$secret");

		// set api endpoint
		curl_setopt($ch,CURLOPT_URL, "$api_url/$resource");

		// apply curl settings we built up from arguments in __call()
		curl_setopt_array($ch, $curl_settings);

		// add data to call
		if(!empty($data)){
			$data = json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data );
		}
	    
	    $result = curl_exec($ch);
	    curl_close($ch);
	    
	    return $result ? json_decode($result, true) : false;
	}
}
