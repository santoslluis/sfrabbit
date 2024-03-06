<?php

namespace App\DependencyInjection;

use App\Entity\TelegramMessage;

class TelegramSender
{
    private string $api_key;
    private string $chat_id;

    public function __construct($api_key, $chat_id)
    {
        $this->api_key = $api_key;
        $this->chat_id = $chat_id;
    }

    public function send(TelegramMessage $message): void
    {
        $url = "https://api.telegram.org/bot" . $this->api_key . "/sendMessage";
        $options = 'chat_id=' . $this->chat_id . '&text=' . urlencode($message->message);
        file_get_contents($url . '?' . $options);
    }
}