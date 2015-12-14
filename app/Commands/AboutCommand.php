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
        $this->replyWithMessage("Bot criado com muito amor por Gustavo Silva do IME-USP.\nVersão: 0.7 beta");
    }
}
