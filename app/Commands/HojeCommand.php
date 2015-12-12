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
        $message = '💧 Níveis em '.$niveis->data." 💧\n\n";
        $represas = array();
        $odd = 0;
        foreach($niveis->niveis as $manan){
            $var = number_format(floatval($manan->hoje) - floatval($manan->ontem), 1);
            if($var > 0) {
                $txt = "💚 (+{$var})";
            } else if($var < 0) {
                $var = -1*$var;
                $txt = "💔 (-{$var})";
            } else {
                $txt = "⚪ (0.0)";
            }

            if($odd == 0)
                $diamond = "🔸";
            else
                $diamond = "🔹";
            $odd = ($odd+1)%2;

            $represas[] = "{$diamond} {$manan->nome}:\n{$diamond} {$manan->hoje} {$txt}";
        }
        $represas = implode("\n\n", $represas);
        $message .= $represas;
        $this->replyWithMessage($message);
    }
}
