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
        $this->replyWithMessage('CantareiraBot criado com muito amor por Gustavo Silva do IME-USP.'.PHP_EOL.'Versão: 0.3 beta');
    }
}
