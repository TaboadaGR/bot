<?php

$apikeytelegram="5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$path = "https://api.telegram.org/bot".$apikeytelegram;
$update = json_decode(file_get_contents("php://input"),TRUE);


 $chatId = $update["message"]["chat"]["id"];
 $message = $update["message"]["text"];

  $reply = $update["message"]["reply_to_message"]["text"];

  if(isset($reply)){

    sendMessage($chatId,$message,TRUE);

    function sendMessage($chatId, $message, $repl){

        if($repl == TRUE) {
           $reply_mark = array(array('force_reply' => TRUE);
           $url = $path.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark).'&text='.urlencode($message);
        }
        else $url = $path.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($message);
   
        file_get_contents($url);
   
 }
   
//     if (strpos($message, "/tiempo") === 0) {
//         // $reply_mark = array(array('force_reply' => TRUE);
//        $location = substr($message, 9);
//        $weather = json_decode(file_get_contents("https://www.el-tiempo.net/api/json/v2/home".$location."&appid=cb5bdb19e2f810101fb82c512a2ab64a"), TRUE)["weather"][0]["main"];
//        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=El tiempo en ".$location."es: ". $weather);
//    }
//    else {
//     file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=no te entiendo ");
//    }

 
 
?>
