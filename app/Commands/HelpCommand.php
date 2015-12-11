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
    protected $description = "Ver ajuda";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $commands = $this->telegram->getCommands();

        $response = '';
        foreach ($commands as $name => $handler) {
            $response .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }

        $this->replyWithMessage($response);
    }
}
