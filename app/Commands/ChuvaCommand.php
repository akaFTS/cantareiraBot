<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use App\Classes\Mananciais;
use App\Classes\Emoji;

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

    protected $keywords = '💧 Pluviometria';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chuvas = Mananciais::getChuvas();
        $messages = array();
        foreach($chuvas->manans as $manan) {
            $hoje = floatval($manan->hoje);
            if($hoje < 0.8)
                $hojmoji = "☀️";
            else if($hoje < 4.0)
                $hojmoji = "⛅";
            else if($hoje < 10.0)
                $hojmoji = "🌧";
            else
                $hojmoji = "⛈";
            
            $messages[] = "♦️ {$manan->nome}:\n\n{$hojmoji} Hoje: {$manan->hoje}\n💧 Acumulado: {$manan->acum}\n📊 Média histórica: {$manan->media}";
        }
        $message = "☔ Pluviometria em {$chuvas->data} ☔\n\n".implode("\n\n〰️〰️〰️〰️〰️〰️〰️〰\n\n", $messages);
        $this->replyWithMessage($message);
    }
}
