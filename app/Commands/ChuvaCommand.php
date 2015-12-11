<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Goutte\Client;

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

        $message = "";

        $client = new Client();
        $crawler = $client->request('GET', 'http://www2.sabesp.com.br/mananciais/DivulgacaoSiteSabesp.aspx');
        $tabela = $crawler->filter("table.tabDados");
        $message = $tabela->filter(".guardaImgBgDetalhe")->text();
        $this->replyWithMessage($message);
    }
}
