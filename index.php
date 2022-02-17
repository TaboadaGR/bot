<?php

echo "hola";
$apikeytelegram="5198652264:AAHjes9nmynBblfzw7TZ4bRYwM_po-aF1Lg";
$path = "https://api.telegram.org/bot".$apikeytelegram;
$update = file_get_contents("php://input");
$update = json_decode($update,TRUE);


 $chatId = $update["message"]["chat"]["id"];
 $message = $update["message"]["text"];

  $reply = $update["message"]["reply_to_message"]["text"];
  $replya = explode(" ",$reply);


//   function sendMessage($chatId, $message, $repl){

//     if($repl == TRUE) {
//        $reply_mark = array(array('force_reply' => TRUE);
//        $url = $path.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&reply_markup='.json_encode($reply_mark).'&text='.urlencode($message);
//     }
//     else $url = $path.'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($message);

//     file_get_contents($url);
// }

//   if(empty($reply)){

//     switch($message){
//         case "Hola":
//              $response = "Hola que tal?";
//             sendMessage($chatId,$response,FALSE);
//             break;

//         case "Tiempo":
//             $response = "¿De qué municipio quieres consultar?";
//             sendMessage($chatId,$response,TRUE);
//             break;

//         case default:
//             $response = "No te he entendido";
//             sendMessage($chatId,$response,FALSE);
//             break;

//   }
//   else {
//       switch($replya[0]){
//           case "¿Qué":
//             getTiempo($chatId,$lugar);
//       }
//   }

//   function getTiempo($chatId,$lugar){

//     sendMessage($chatId,$lugar,FALSE);
//   }
   
// //     if (strpos($message, "/tiempo") === 0) {
// //         // $reply_mark = array(array('force_reply' => TRUE);
// //        $location = substr($message, 9);
// //        $weather = json_decode(file_get_contents("https://www.el-tiempo.net/api/json/v2/home".$location."&appid=cb5bdb19e2f810101fb82c512a2ab64a"), TRUE)
// //          $weather= ["ciudades"][1]["temperatures"]["max"];
// //        sendMessage($chatId,$weather,FALSE);
// // NOOOOOOOOOOOOOO file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=El tiempo en ".$location."es: ". $weather);
// //    }
// //    else {
// //     file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=no te entiendo ");
// //    }

 
 
?>
