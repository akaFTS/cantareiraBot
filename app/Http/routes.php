<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('/sethook', function () use ($app) {
    Telegram::setWebhook('https://cantareirabot.herokuapp.com/webhook');
    $response = Telegram::getMe();

	$botId = $response->getId();
	$firstName = $response->getFirstName();
	$username = $response->getUsername();
	return $firstName;
});

$app->post('/webhook', function () use ($app) {
    Telegram::commandsHandler(true);
    return 'ok';
});
