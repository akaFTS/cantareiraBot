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

        $markup = $this->replyKeyboardMarkup($keyboard, true, true);
        $this->replyWithMessage("Bot criado com muito amor por Gustavo Silva do IME-USP.\nVersão: 0.7 beta", false, null, $markup);
    }
}
