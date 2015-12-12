<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class AboutCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "about";

    /**
     * @var string Command Description
     */
    protected $description = "Sobre o bot";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
                 ['0']
        ];

        $reply_markup = $this->replyKeyboardMarkup($keyboard, true, true);
        $this->replyWithMessage('CantareiraBot criado com muito amor por Gustavo Silva do IME-USP.'.PHP_EOL.'Versão: 0.3 beta');
    }
}
