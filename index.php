<?php 
include 'API.php';

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
		"title" => "Campaign Title",
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
// print_r($Crowdtilt->get('users'));
// print_r($Crowdtilt->get('users/USRCE526FE203AD11E4A2F4A3277B2F0E86/campaigns'));
// print_r($Crowdtilt->post('campaigns', $campaign));
print_r($Crowdtilt->put('campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86', $update));

// print_r($Crowdtilt->delete('users/USR4FF457D403A611E48791A3277B2F0E86', $data));


// $ curl -X POST -H Content-Type:application/json -u 554cac7c0efff25d8784e712b0c274:70499e57a674ea547868ffcc520564ece919481e \
// https://api-sandbox.crowdtilt.com/v1/users/USR4FF457D403A611E48791A3277B2F0E86 \
// -d'
// {
//    "user" : {
//       "email" : "user@example.com"
//    }
// }'


// curl -X PUT -H Content-Type:application/json -u 554cac7c0efff25d8784e712b0c274:70499e57a674ea547868ffcc520564ece919481e \
// https://api-sandbox.crowdtilt.com/v1/campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86 \
// -d'
// {
//     "campaign": {
//         "title":"A Different Campaign Title"
//     }
// }'









// // $output = get_resource("users/USR40F3DE02FE6611E38FB9850026BE24FC");
// $output = User::get('USR40F3DE02FE6611E38FB9850026BE24FC');
// $output = User::campaigns('USR40F3DE02FE6611E38FB9850026BE24FC');
// $data = ['user' =>[
// 	// "firstname" => "foo",
// 	// "lastname" => "bar",
// 	"email" => "user@exazmple.com",
// 	"metadata" => [ "img" => "http://www.example.com/path-to-profile-image" ]
// ]];

// prettyPrint( crowdtilt::post_resource('users', $data));

// prettyPrint($output);

// print(crowdtilt_resource::key);


