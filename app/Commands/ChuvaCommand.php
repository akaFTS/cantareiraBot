<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use \Mananciais;

class ChuvaCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "chuva";

    /**
     * @var string Command Description
     */
    protected $description = "Como andam as chuvas nos mananciais";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $message = Mananciais::getChuvas();
        $this->replyWithMessage($message);
    }
}
