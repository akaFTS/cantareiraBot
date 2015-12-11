<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/sethook", function(){
	Telegram::setWebhook('https://cantareirabot.herokuapp.com/webhook');
	$response = Telegram::getMe();

	$botId = $response->getUsername();
	return $botId;
});

Route::post('/webhook', function (){
    //Telegram::commandsHandler(true);
});