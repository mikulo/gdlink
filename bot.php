<?php 


header("Content-Type: application/json");

$content = file_get_contents("php://input");
$update  = json_decode($content, true);

if(!$update) {
  exit;
}

$message   = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId    = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname  = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username  = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date      = isset($message['date']) ? $message['date'] : "";
$text      = isset($message['text']) ? $message['text'] : "";
$userId    = isset($message['from']['id']) ? $message['from']['id'] : "";
$matches = array();
if (preg_match( '/.*drive.google.com\/open\?id=.{33}$/', $text,$matches ))
{  
    preg_match( '/\?id=.{33}$/', $text,$matches );
    $response = "获取成功,直链为:\nhttps://gdlink.432100.xyz/".$matches[0] ;
    $response = iconv('GB2312', 'UTF-8', $response);
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
}
elseif (preg_match( '/.*drive.google.com.*\/file\/d\/.{33}\//', $text,$matches ))
{
    preg_match( '/\/file\/d\/.{33}/', $text,$matches );
    $response = "获取成功,直链为:\nhttps://gdlink.432100.xyz/?id=".substr($matches[0],-33);
    $response = iconv('GB2312', 'UTF-8', $response);
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
}/*//响应命令
elseif (preg_match( '/\/link.*drive.google.com\/open\?id=.{33}$/', $text,$matches ))
{  
    preg_match( '/\?id=.{33}$/', $text,$matches );
    $response = "获取成功,直链为:\nhttps://gdlink.432100.xyz/".$matches[0] ;
    $response = iconv('GB2312', 'UTF-8', $response);
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
}
elseif (preg_match( '/\/link.*drive.google.com.*\/file\/d\/.{33}\//', $text,$matches ))
{
    preg_match( '/\/file\/d\/.{33}/', $text,$matches );
    $response = "获取成功,直链为:\nhttps://gdlink.432100.xyz/?id=".substr($matches[0],-33);
    $response = iconv('GB2312', 'UTF-8', $response);
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
}
elseif ($text=="/link"||$text=="/link@gdlink_bot")
{
    $response = iconv('GB2312', 'UTF-8', "请在指令后面加上文件链接!");
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
     $message_id =  json_decode($geturl, true)["result"][message_id];
    sleep(2);
    @file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/deleteMessage?chat_id=$chatId&message_id=$message_id");
}*/
elseif ($text=="/start")
{
    $response = iconv('GB2312', 'UTF-8', "欢迎使用,请向我发送文件链接开始提取直链!");
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
}

elseif (preg_match( '/.*drive.google.com\/.*\/folders\/.{33}/', $text ))
{
    $response = iconv('GB2312', 'UTF-8', "抱歉,仅支持单文件直链提取,不支持目录链接!");
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
     //$message_id =  json_decode($geturl, true)["result"][message_id];
    //sleep(2);
    //@file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/deleteMessage?chat_id=$chatId&message_id=$message_id");
}/*
else
{
    $response = iconv('GB2312', 'UTF-8', "链接格式错误!");
    $geturl = file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/sendMessage?chat_id=$chatId&&text=$response");
     //$message_id =  json_decode($geturl, true)["result"][message_id];
   // sleep(2);
   // @file_get_contents("https://api.telegram.org/bot682286968:AAGHxSsTWl59bxTbF5yqehzgOpwcd4Sm-vc/deleteMessage?chat_id=$chatId&message_id=$message_id");
}*/

?>

