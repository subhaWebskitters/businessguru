<?php
include(public_path().'/twilio-php/Services/Twilio.php');
$mode           = 'sandbox';
$number         = '+14155992671';
$api_version    = '2010-04-01';
$message_length = '130';
$sender_number  = '+917059118959';
$AccountSid     = "AC8e136d9be5f83373ac47603992312fe7"; //"AC722591aac805f37235896394d6fe2b1c";
$AuthToken      = "ea9e5a0fc3340fd1932c080f649ce79a"; //"562d7296bd3d159bf9dc6747410af618";
$client         = new Services_Twilio($AccountSid, $AuthToken);

$sms = $client->account->messages->create(array( 
	'To' => "+919836240762", 
	'From' => "+14155992671", 
	'Body' => "Hii ---> Order # 158. Delivery. Due ASAP. For Tim Matroni. Phone number is (877) 787-6368 453 Lincoln St, 100, Carlisle, PA, 17013. Company is MenuDrive. Building is Murata. Comments: Ring the doorbell at the main entrance when you get here. Payment: Credit Card. Items ordered: 1 8 Piece Oven Roasted Wings with Teriyaki...1 SM Round with Extra Pizza Sauce, Plain Crust, Whole Toppings are Anchovies, 1st Half Toppings are Bleu Cheese, 2nd Half Toppings are Artichokes and Extra Bacon. Total is $39.01",   
));
echo $sms.'----';
exit();
?>