<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class SettingsCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "settings";

    /**
     * @var string Command Description
     */
    protected $description = "Ver configurações";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $response = "No momento não há nada pra ser configurado no bot.";

        $this->replyWithMessage($response);
    }
}
