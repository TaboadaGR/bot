<?php

/*variables de la conexión del bot de telegrama 
con la api de telegram*/
$apikeytelegram="5110291244:AAHQp8hxNsaeySocMoTumAHxEjmxrh9M-v8";
$path = "https://api.telegram.org/bot".$apikeytelegram;
$file = file_get_contents("php://input");
$update = json_decode($file,TRUE);

//variables para extraer datos del usuario 
$chatId = $update["message"]["chat"]["id"];
echo $chatId;
echo "/";
$message = $update["message"]["text"];
$command = explode(" ",$message);

//variables para contestar al usuario
$reply = $update["message"]["reply_to_message"]["text"];
$replya = explode(" ",$reply);


/*Función para enviar un mensaje al usuario, en función
de lo que envie al bot.*/ 
function sendMessage($chatId, $server, $message,$repl){
    
    if($repl == TRUE) {
       $reply_mark = array('force_reply' => TRUE);
       $url = $server.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark).'&text='.urlencode($message);
       file_get_contents($url);
    }
    else{
        echo "inicio";
        echo "/";
        $url = $server.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($message);
        file_get_contents($url);
        echo $url;
        echo "/";
        echo $chatId;
        echo "/";
        echo $message;
        echo "fin";
    }    
}

if(!empty($message)){
    sendMessage($chatId,$path,"Hola",FALSE);
}

// if(empty($reply)){

// //Comprueba con el "switch" que ha introducido el usuario
//     switch($command[0]){
//         case "Hola":
//             $response = "Hola que tal?";
//             sendMessage($chatId,$response,FALSE);
//             break;

//         case "/tiempo":
//             $response = "¿De qué municipio quieres consultar?";
//             sendMessage($chatId,$response,TRUE);
//             break;

//         default:
//             $response = "No te he entendido";
//             sendMessage($chatId,$response,FALSE);
//             break;

//   }
// }
// else {
//     switch($replya[0]){
//         case "¿De":
//             getTiempo($chatId,$message);
//             break;
        
//         default:
//             $response = "No te he entendido (reply)";
//             sendMessage($chatId,$response,FALSE);
//             break;
            
//     }
// }

//   function getTiempo($chatId,$lugar){

//     sendMessage($chatId,$lugar,FALSE);
//   }

 
 
?>
