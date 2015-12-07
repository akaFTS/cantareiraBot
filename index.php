<?php

require 'vendor/autoload.php';
use Telegram\Bot\Api;


$telegram = new Api('173649343:AAGzLaPRv_6_NIrkFguAUI2hOQZM3WEUdKU');
$telegram->setWebhook('https://cantareirabot.herokuapp.com/index.php');

$updates = $telegram->getWebhookUpdates();

foreach ($updates as $up) {
	$down = json_encode($up);
	$msg = json_decode($down);
	$cid = json_encode($msg->chat->id);
	$amigo = json_encode($msg->chat->first_name);
	error_log($cid);
	error_log(json_encode($msg));
	//$telegram->sendMessage($cid, "Oi pra voce tambem amigo ".$amigo."!");
}