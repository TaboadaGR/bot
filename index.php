<?php

$path = "https://api.telegram.org/bot"
$apikeytelegram="5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$update = json_decode(file_get_contents("php://input"), TRUE);
$APIKEY = "6d433c5dcbmsh8f04c3c9f812e94p1f26d6jsn166e00f9d911";

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$peticion = $update["text"];

echo "hola dentro";

// switch($peticion){
//     case"/country":
//         function countryCovid();
//     break;
//     default: echo"eeeem no se";
// }
// // if ($message=="/weather"){
//     function countryCovid($path,$chatId,$hola){

//     echo "hola dentro";
//     $url=$path.$apikeytelegram."/sendMessage?chat_id=".$chatId."&parse_mode=HTML&text=".urlencode($hola);
//     file_get_contents($url);

//     $request = new HttpRequest();
//     $request->setUrl('https://covid-19-data.p.rapidapi.com/country/code');
//     $request->setMethod(HTTP_METH_GET);
    
//     $request->setQueryData([
//         'code' => 'it'
//     ]);
    
//     $request->setHeaders([
//         'x-rapidapi-host' => 'covid-19-data.p.rapidapi.com',
//         'x-rapidapi-key' => '6d433c5dcbmsh8f04c3c9f812e94p1f26d6jsn166e00f9d911'
//     ]);
    
//     try {
//         $response = $request->send();
    
//         echo $response->getBody();
//     } catch (HttpException $ex) {
//         echo $ex;
//     }
//     }

    

// }

/*if (strpos($message, "/weather") === 0) {
    $location = substr($message, 9);
    $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=mytoken"), TRUE)["weather"][0]["main"];
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
    }*/

?>
