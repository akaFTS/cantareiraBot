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
                $emo = "💚";
                $txt = "(+{$var})";
            } else if($var < 0) {
                $emo = "💔";
                $var = -1*$var;
                $txt = "(-{$var})";
            } else {
                $emo = "⚪";
                $txt = "(0.0)";
            }
            if($manan->chuva < 0.8)
                $hojmoji = "☀️";
            else if($manan->chuva < 2.0)
                $hojmoji = "⛅";
            else if($manan->chuva < 6.0)
                $hojmoji = "🌧";
            else
                $hojmoji = "⛈";

            if($odd == 0)
                $diamond = "🔸";
            else
                $diamond = "🔹";
            $odd = ($odd+1)%2;

            $represas[] = "{$diamond} {$manan->nome}:\n{$diamond} {$emo} {$manan->hoje} {$txt}\n{$diamond} {$hojmoji} {$manan->chuva} mm";
        }
        $represas = implode("\n\n", $represas);
        $message .= $represas;
        $this->replyWithMessage($message);
    }
}
