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


// This file 'bootstraps' the api so you can just include 'crowdtilt/API.php';

include_once 'config.php';
require_once 'Crowdtilt.php';

$Crowdtilt = new Crowdtilt($account_details);



#Data useful for testing connection

$user = [
	"user" => [
	      "firstname" => "the",
	      "lastname" => "dude",
	      "email" => "email@example.com"
	]
];

$campaign = [
	"campaign" => [
		"user_id" => "USRCE526FE203AD11E4A2F4A3277B2F0E86",
		"id" => "CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86",
		"title" => "Campaign Title 2",
		"tilt_amount" => 100,
		"metadata"  => [ "img"  => "http://www.example.com/path-to-campaign-image" ],
		"expiration_date" => "2000-01-02T01:02:03Z"
	]
];
$update_campaign = [
	"campaign" => [
		'title' => "A Different Campaign Title"
	]
];
$comment = [
	"comment" => [
		"user_id" => "USRCE526FE203AD11E4A2F4A3277B2F0E86",
        "title" => "Optional Title",
        "body" => "Comment Body",
        "score" => 1,
        "parent_id" => null
	]
];
