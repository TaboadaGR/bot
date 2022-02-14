<?php

$apikeytelegram="5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$path = "https://api.telegram.org/bot".$apikeytelegram;
$update = json_decode(file_get_contents("php://input"),TRUE);


 $chatId = $update["message"]["chat"]["id"];
 $message = $update["message"]["text"];

 if (strpos($message, "/weather") === 0) {
    $location = substr($message, 9);
    $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=cb5bdb19e2f810101fb82c512a2ab64a"), TRUE)["weather"][0]["main"];
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=El tiempo en ".$location." está: ". $weather);
}

if(strpos($message, "/covid") === 0){
    $client = new http\Client;
    $request = new http\Client\Request;
    
    $request->setRequestUrl('https://covid-193.p.rapidapi.com/countries');
    $request->setRequestMethod('GET');
    $request->setHeaders([
        'x-rapidapi-host' => 'covid-193.p.rapidapi.com',
        'x-rapidapi-key' => '6d433c5dcbmsh8f04c3c9f812e94p1f26d6jsn166e00f9d911'
    ]);
    
    $client->enqueue($request)->send();
    $response = $client->getResponse();
    
    echo $response->getBody();
}
?>
