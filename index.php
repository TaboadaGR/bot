<?php

$path = "https://api.telegram.org/bot5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$update = json_decode(file_get_contents("php://input"), TRUE);


$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$hola="hola";

//if ($message[0]=="/weather"){
    echo "hola dentro";
    $url=$path."/sendMessage?chat_id=".$chatId."&parse_mode=HTML&text=".urlencode($hola);
    file_get_contents($url);
//}

/*if (strpos($message, "/weather") === 0) {
    $location = substr($message, 9);
    $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=mytoken"), TRUE)["weather"][0]["main"];
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
    }*/
?>
