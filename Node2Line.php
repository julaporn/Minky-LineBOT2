<?php
   $accessToken = "4ipMPNdnISFqBZJ+Zdx4cvMn8/L+RaD76H7xDQJElyeWKQsLD2qh86aVmXs+wHu3o0BmRn83h0ibHrMwGAFr3H5WHe5dzmYi4Ik13FjFDCB9RAC4wZPwenW+CItiqydLDaAK05DZreUfsHU42wNBcgdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   
   //****************************
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   //****************************
   
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //$message = $arrayJson['events'][0]['ESP']['values'];
   //รับ id ของผู้ใช้
   //$id = $arrayJson['events'][0]['source']['userId'];
   $id = "U930cda3cddf9ba7693afa910d00858eb"
   #ตัวอย่าง Message Type "Text + Sticker"
   echo $id ;
   if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าวววว";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
	  echo "Push Message";
   }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>


