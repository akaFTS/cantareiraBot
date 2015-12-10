<?php

require 'vendor/autoload.php';
require 'comandos/StartCommand.php';
use Telegram\Bot\Api;


$telegram = new Api('173649343:AAGzLaPRv_6_NIrkFguAUI2hOQZM3WEUdKU');
$telegram->setWebhook('https://cantareirabot.herokuapp.com/proccess.php');
$telegram->addCommand(Telegram\Bot\Commands\StartCommand::class);