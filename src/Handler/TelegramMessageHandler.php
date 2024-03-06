<?php

namespace App\Handler;

use App\DependencyInjection\TelegramSender;
use App\Entity\TelegramMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
class TelegramMessageHandler {

    private TelegramSender $telegram;

    public function __construct(TelegramSender $telegram) {
        $this->telegram = $telegram;
    }

    public function __invoke(TelegramMessage $message)
    {
        $this->telegram->send($message);
    }
}