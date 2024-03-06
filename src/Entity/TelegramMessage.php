<?php

namespace App\Entity;

use ApiPlatform\Metadata\Post;
use App\Processor\TelegramMessageProcessor;

#[Post(uriTemplate: '/say', processor: TelegramMessageProcessor::class)]
final class TelegramMessage {
    public string $message;
}