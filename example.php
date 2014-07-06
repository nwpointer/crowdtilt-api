<?php 
include 'API.php';

// examples of use:

show($Crowdtilt->get('users'));
// show($Crowdtilt->get('users/USRCE526FE203AD11E4A2F4A3277B2F0E86/campaigns'));
// show($Crowdtilt->get("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments"));
// show($Crowdtilt->post("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments" ,$comment));
// show($Crowdtilt->get("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments/CMT1ED03E9404A911E4A2F4A3277B2F0E86"));
// show($Crowdtilt->delete("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments/CMT1ED03E9404A911E4A2F4A3277B2F0E86"));


// this is a pretty print function 
function show($data){
	echo '<pre>', print_r($data), '</pre>';
}


