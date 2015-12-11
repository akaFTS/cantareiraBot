<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class HojeCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "hoje";

    /**
     * @var string Command Description
     */
    protected $description = "Estado das represas hoje";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithMessage('Indisponível no momento.');
    }
}
