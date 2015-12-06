<?php

require 'vendor/autoload.php';
use Telegram\Bot\Api;


$telegram = new Api('173649343:AAGzLaPRv_6_NIrkFguAUI2hOQZM3WEUdKU');

// Standalone
$me = $telegram->getMe();

$botId = $me->getId();
$firstName = $me->getFirstName();
$username = $me->getUsername();

error_log($firstName." - ".$username." - ".$botId);
