<?php

namespace App\Processor;


use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\TelegramMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class TelegramMessageProcessor implements ProcessorInterface {

    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus) {
        $this->bus = $bus;
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): TelegramMessage
    {
        $msg = new TelegramMessage();
        $msg->message = $data->message;
        $this->bus->dispatch($msg);
        return $msg;
    }
}