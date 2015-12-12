<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use App\Classes\Mananciais;

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
        $niveis = Mananciais::getHoje();
        $message = 'Nível das represas em '.$niveis->data.'\n';
        $represas = array();
        foreach($niveis->niveis as $manan){
            $represas[] = "- {$manan->nome}:\n{$manan->hoje}";
        }
        $represas = implode("\n\n", $represas);
        $message .= $represas;
        $this->replyWithMessage($message);
    }
}
