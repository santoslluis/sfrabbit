<?php

namespace tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class TelegramMessageTest extends ApiTestCase
{
    public function testPostSayShouldWork(): void
    {
        $client = static::createClient();
        $client->setDefaultOptions(['headers' => ['Content-Type' => 'application/ld+json']]);
        $message = ['message' => 'Hello, World!'];
        $response = $client->request(
            'POST',
            '/say',
            ['body' => json_encode($message)]
        );
        $this->assertResponseIsSuccessful();
    }

    public function testPostHelloShouldNotWork(): void {

        $client = static::createClient();
        $client->request('POST', '/hello');
        $this->assertResponseStatusCodeSame(404);
    }

}