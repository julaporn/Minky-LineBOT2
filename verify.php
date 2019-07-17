<?php
$access_token = '/T/Ub07gaOJPvQkDfhwQpexBHJBZeLPd4RY8/9YsCYiXkbtseGVJSOIMsMLZlVWgo0BmRn83h0ibHrMwGAFr3H5WHe5dzmYi4Ik13FjFDCBGHyupAeCmrgvqI3m9eoqXrM6jBhk5FEMNyJo5avfukgdB04t89/1O/w1cDnyilFU=';    //PUT LINE token ID at "Channel access token (long-lived)"
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
