<?php

namespace App\Commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class LikeCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "like";

    /**
     * @var string Command Description
     */
    protected $description = "Curtir o bot";

    protected $keywords = "👍 Curtir";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $response = "Gostou desse bot 😊? O que acha de dar 5 estrelas para ajudá-lo 😁?\nEntão, entre nesse site: https://storebot.me/bot/cantareirabot\n⭐⭐⭐⭐⭐";

        $this->replyWithMessage($response);
    }
}