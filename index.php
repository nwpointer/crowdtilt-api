<?php 
include 'API.php';



// print_r($Crowdtilt->get('users'));
// print_r($Crowdtilt->get('users/USRCE526FE203AD11E4A2F4A3277B2F0E86/campaigns'));
// print_r($Crowdtilt->post('campaigns', $campaign));
echo '<pre>', print_r($Crowdtilt->get("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments")), '</pre>';

// print($Crowdtilt->post("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments", $comment));
// print_r($Crowdtilt->delete("campaigns/CMP2ACDE3AE03AF11E4A2F4A3277B2F0E86/comments/CMTE91F593803C711E4A63BA3277B2F0E86"));




