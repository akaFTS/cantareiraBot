<?php

require 'vendor/autoload.php';
use Telegram\Bot\Api;


$telegram = new Api('173649343:AAGzLaPRv_6_NIrkFguAUI2hOQZM3WEUdKU');
$telegram->setWebhook('https://cantareirabot.herokuapp.com/index.php');

$updates = $telegram->getWebhookUpdates();

foreach ($updates as $up) {
	error_log(print_r($up, true));
	$amigo = $up->from->first_name;
	$cid = $up->chat->id;
	error_log("cid ".$cid." amigo ".$amigo);
	//$telegram->sendMessage($cid, "Oi pra voce tambem amigo ".$amigo."!");
}