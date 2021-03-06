<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "help";

    /**
     * @var string Command Description
     */
    protected $description = "Ver lista de comandos";

    protected $keywords = "❓ Ajuda";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $keyboard = [
            ['📊 Níveis Hoje'],
            ['💧 Pluviometria'],
            ['❓ Ajuda', '👍 Curtir', '💭 Sobre']
        ];

        $markup = $this->getTelegram()->replyKeyboardMarkup($keyboard, true, false);


        $commands = $this->telegram->getCommands();

        $response = 'Lista de comandos do bot: '.PHP_EOL;
        foreach ($commands as $name => $handler) {
            $response .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }

        $this->replyWithMessage($response, false, null, $markup);
    }
}
