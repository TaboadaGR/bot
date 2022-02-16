<?php

$apikeytelegram="5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$path = "https://api.telegram.org/bot".$apikeytelegram;
$update = json_decode(file_get_contents("php://input"),TRUE);


 $chatId = $update["message"]["chat"]["id"];
 $message = $update["message"]["text"];

 $reply = $update["message"]["reply_to_message"]["text"];

 if(isset($reply)){

    // function sendMessage($chatId, $message, $repl){

    //     if($repl == TRUE) {
    //        $reply_mark = array(array('force_reply' => TRUE);
    //        $url = $GLOBALS[website].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark).'&text='.urlencode($response);
    //     }
    //     else $url = $GLOBALS[website].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
   
    //     file_get_contents($url);
    // }
   
   
    if (strpos($message, "/weather") === 0) {
        $reply_mark = array(array('force_reply' => TRUE);
       $location = substr($message, 9);
       $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=cb5bdb19e2f810101fb82c512a2ab64a"), TRUE)["weather"][0]["main"];
       file_get_contents($path."/sendmessage?chat_id=".$chatId.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark)."&text=Here's the weather in ".$location.": ". $weather);
   }
 }
 
 
?>
