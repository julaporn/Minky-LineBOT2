<?php

function send_LINE($msg){
 $access_token = '4ipMPNdnISFqBZJ+Zdx4cvMn8/L+RaD76H7xDQJElyeWKQsLD2qh86aVmXs+wHu3o0BmRn83h0ibHrMwGAFr3H5WHe5dzmYi4Ik13FjFDCB9RAC4wZPwenW+CItiqydLDaAK05DZreUfsHU42wNBcgdB04t89/1O/w1cDnyilFU=';    //PUT LINE token ID at "Channel access token (long-lived)" 
 $messages = [
        'type' => 'text',
        'text' => $msg 
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => 'U930cda3cddf9ba7693afa910d00858eb',         //PUT LINE ID at "Your user ID"
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL,$url);
	  curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
