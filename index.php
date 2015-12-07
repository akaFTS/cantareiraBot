<?php

require 'vendor/autoload.php';
use Telegram\Bot\Api;


$telegram = new Api('173649343:AAGzLaPRv_6_NIrkFguAUI2hOQZM3WEUdKU');
$telegram->setWebhook('https://cantareirabot.herokuapp.com/index.php');

$updates = $telegram->getWebhookUpdates();

foreach ($updates as $up) {
	$down = json_encode($up);
	$down = json_decode($down);
	$amigo = $down->from->first_name;
	$cid = $down->chat->id;
	error_log("bleh ".$cid);
	error_log($down);
	$telegram->sendMessage($cid, "Oi pra voce tambem amigo ".$amigo."!");
}