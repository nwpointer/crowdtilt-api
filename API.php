<?php 

/**
* Mininimal Crowdtilt API v1 Wrapper
* https://crowdtilt.com
* https://github.com/Crowdtilt/crowdtilt-api-spec/
*
* @author Nathan Pointer <nwpointer@gmail.com>
* @version 1.1.1
*
**/

// This 'bootstraps' the api so you can just include 'crowdtilt/API.php';

include_once 'config.php';
include_once 'Crowdtilt.php';
$Crowdtilt = new Crowdtilt($account_details);


// these classes provide an optional abstraction layer

// include_once 'resources/Campaign';
// include_once 'resources/Payment';
// include_once 'resources/User';