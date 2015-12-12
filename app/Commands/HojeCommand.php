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
        $message = '💧 Nível das represas em '.$niveis->data." 💧\n\n";
        $represas = array();
        foreach($niveis->niveis as $manan){
            $var = floatval($manan->hoje) - floatval($manan->ontem);
            if($var > 0) {
                $txt = "(+ {$var})"
            } else if($var < 0) {
                $txt = "(- {-1*$var})";
            } else {
                $txt = "(0.0)";
            }
            $represas[] = "- {$manan->nome}:\n{$manan->hoje} {$txt}";
        }
        $represas = implode("\n\n", $represas);
        $message .= $represas;
        $this->replyWithMessage($message);
    }
}
