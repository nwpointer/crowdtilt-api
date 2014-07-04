<?php 

// place your API access details here:
// contact support.api@crowdtilt.com to request these.

$account_details = [
	'api_url'=>'https://api-sandbox.crowdtilt.com/v1',
	'api_key'=>'554cac7c0efff25d8784e712b0c274',
	'secret'=>'70499e57a674ea547868ffcc520564ece919481e'
];



#testing data:

$data = [
	"user" => [
	      "firstname" => "nathan",
	      "lastname" => "dude",
	      "email" => "nwpnter@example.com"
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
$update = [
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
