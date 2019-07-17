<?php
 require("pub.php");
 require("line.php");

// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);

// Validate parsed JSON data
if (!is_null($events['NodeMCU_No1'])) {
   send_LINE($events['NodeMCU_No1']);
   echo "JSON data OK";
}

if (!is_null($events['events'])) {
   echo "line bot";
   // Loop through each event
   foreach ($events['events'] as $event) {
	// Reply only when message sent is in 'text' format
	if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
	   // Get text sent
	   $text = $event['message']['text'];
	   // Get replyToken
	   $replyToken = $event['replyToken'];
  	   // Build message to reply back
       $Topic = "NodeMCU_No1" ;
	   getMqttfromlineMsg($Topic,$text);
	}
    }
 }

 echo "OK3";
?>
