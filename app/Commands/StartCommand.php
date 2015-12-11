<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Iniciar conversa com o bot";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->triggerCommand('help');
    }
}
