<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class SemanalCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "semanal";

    /**
     * @var string Command Description
     */
    protected $description = "Variação semanal das represas";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithMessage('Indisponível no momento.');
    }
}
