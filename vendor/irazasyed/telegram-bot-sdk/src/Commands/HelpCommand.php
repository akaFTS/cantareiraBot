<?php

namespace Telegram\Bot\Commands;

/**
 * Class HelpCommand
 *
 * @package Telegram\Bot\Commands
 */
class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "help";

    /**
     * @var string Command Description
     */
    protected $description = "Help command, Get a list of commands";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $keyboard = [
            ['/hoje'],
            ['chuva', '/chuva.Chuva', '/chuva Chuva'],
            ['1', '2', '3'],
                 ['0']
        ];

        $markup = $this->getTelegram()->replyKeyboardMarkup($keyboard, true, false);

        $commands = $this->telegram->getCommands();

        $response = '';
        foreach ($commands as $name => $handler) {
            $response .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }
        error_log($markup);
        $this->replyWithMessage($response, false, null, $markup);
    }
}
