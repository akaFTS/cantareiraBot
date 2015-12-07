<?php

require 'vendor/autoload.php';
use Telegram\Bot\Api;


$telegram = new Api('173649343:AAGzLaPRv_6_NIrkFguAUI2hOQZM3WEUdKU');
$telegram->setWebhook('https://cantareirabot.herokuapp.com/index.php');

$updates = $telegram->getWebhookUpdates();

foreach ($updates as $up) {
	error_log(json_encode($up));
	$amigo = $up->from;
	$cid = $up->chat;
	error_log("cid ".$cid." amigo ".$amigo);
	//$telegram->sendMessage($cid, "Oi pra voce tambem amigo ".$amigo."!");
}