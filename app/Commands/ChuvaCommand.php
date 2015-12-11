<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use App\Classes\Mananciais;

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
        $chuvas = Mananciais::getChuvas();
        $messages = array();
        foreach($chuvas as $manan) {
            $messages[] = "- {$manan->nome}:\n\nHoje: {$manan->hoje}\nAcumulado: {$manan->acum}\nMédia histórica: {$manan->media}\n\n";
        }
        $message = implode("-------------\n\n", $messages);
        $this->replyWithMessage($message);
    }
}
