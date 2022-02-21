<?php

/*variables de la conexión del bot de telegrama 
con la api de telegram*/
$apikeytelegram="5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$path = "https://api.telegram.org/bot".$apikeytelegram;
$file = file_get_contents("php://input");
$update = json_decode($file,TRUE);

//variables para extraer datos del usuario 
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$command = explode(" ",$message);

//variables para contestar al usuario
$reply = $update["message"]["reply_to_message"]["text"];
$replya = explode(" ",$reply);


/*Función para enviar un mensaje al usuario, en función
de lo que envie al bot.*/ 
function sendMessage($chatId, $message){


    if($repl == TRUE) {
       $reply_mark = array('force_reply' => TRUE);
       $url = $path.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark).'&text='.urlencode($message);
    }
    else 
    $url = $path.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($message);

    file_get_contents($url);
}

  if(empty($reply)){

//Comprueba con el "switch" que ha introducido el usuario
    switch($command[1]){
        case "Hola":
            $response = "Hola que tal?";
            sendMessage($chatId,$response);
            break;

        case "/tiempo":
            $response = "¿De qué municipio quieres consultar?";
            sendMessage($chatId,$response);
            break;

        default:
            $response = "No te he entendido";
            sendMessage($chatId,$response);
            break;

  }
}
  else {
      switch($replya[0]){
        case "¿Qué":
            getTiempo($chatId,$lugar);
            break;
        
        default:
            $response = "No te he entendido (reply)";
            sendMessage($chatId,$response,FALSE);
            break;
            
      }
  }

//   function getTiempo($chatId,$lugar){

//     sendMessage($chatId,$lugar,FALSE);
//   }
   
//     if (strpos($message, "/tiempo") === 0) {
//         // $reply_mark = array(array('force_reply' => TRUE);
//        $location = substr($message, 9);
//        $weather = json_decode(file_get_contents("https://www.el-tiempo.net/api/json/v2/home".$location."&appid=cb5bdb19e2f810101fb82c512a2ab64a"), TRUE)
//          $weather= ["ciudades"][1]["temperatures"]["max"];
//        sendMessage($chatId,$weather,FALSE);
// NOOOOOOOOOOOOOO file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=El tiempo en ".$location."es: ". $weather);
//    }
//    else {
//     file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=no te entiendo ");
//    }

 
 
?>
