<?php 
include 'config.php';

// $output = get_resource("users/USR40F3DE02FE6611E38FB9850026BE24FC");
$output = User::get('USR40F3DE02FE6611E38FB9850026BE24FC');
$output = User::campaigns('USR40F3DE02FE6611E38FB9850026BE24FC');
$data = ['user' =>[
	// "firstname" => "foo",
	// "lastname" => "bar",
	"email" => "user@exazmple.com",
	"metadata" => [ "img" => "http://www.example.com/path-to-profile-image" ]
]];

prettyPrint( crowdtilt::post_resource('users', $data));

// prettyPrint($output);

// print(crowdtilt_resource::key);


