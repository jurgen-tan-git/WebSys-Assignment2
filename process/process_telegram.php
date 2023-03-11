<?php
header('Content-Type: text/plain');
error_reporting(E_ERROR | E_PARSE);
$chat_id = check_telegram_verified($_GET['telegram_id']);

if ($chat_id != false){
    $apiToken = "5954482111:AAGscQl3YDz5db9Ixzuu-OGFiGShXPBych4";
    $message = "DO NOT REPLY. This message is a verification by Bank of SIT." ;
    $data = [
        'chat_id' => $chat_id,
        'text' => $message 
    ];
    $json_response = curl_req("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
    if($json_response["ok"] == false){
        $response = "false";
    }else{
        $response = $chat_id;
    }
} else{
  $response = "false";  
}

// Return the response as plain text
echo $response;


function check_telegram_verified($telegram_id){
    $json_response = curl_req("https://api.telegram.org/bot5954482111:AAGscQl3YDz5db9Ixzuu-OGFiGShXPBych4/getUpdates");
    $chat_id = false;
    foreach ($json_response["result"] as $result) {
        //check exist
        if($result["message"]["from"]["username"] === $telegram_id) {
            $chat_id = $result["message"]["from"]["id"];
            return $chat_id;
        }
    }
    return $chat_id;
}

function curl_req($link){
    $cURLConnection = curl_init();
    curl_setopt($cURLConnection, CURLOPT_URL, $link);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $curl_result = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    return json_decode($curl_result,true);
}
?>