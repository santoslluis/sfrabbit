# SFRabbit - Symfony & RabbitMQ

This project is to test integration between Symfony and RabbitMQ.

It's a simple API listening at [/say](http://localhost:8000/say) and sends a Telegram message using and async queue
via RabbitMQ. 


## Pre-Requisites
- Must have docker installed.
- Must have a Telegram account.

## Installation
- Create a Telegram bot using [BotFather](t.me/@botfather) and get the api key.
- Start a conversation with your new bot.
- Get the chat id with `curl https://api.telegram.org/bot<bot-api-key>/getUpdates`
- Set up the `TG_API_KEY` and `TG_CHAT_ID` variables in `.env.local`
- Install symfony dependencies with `docker run api composer install`
- Run the api with `docker compose up`

## Test
To run the tests, simply execute `bin/phpunit`

## Usage
```curl http://localhost:8000/say -X POST -H 'content-type: application/ld+json' -d '{"message": "Hello, World!"}'```

This will make your bot send a message to yourself.

## Let's do some fun
- Check the RabbitMQ statistics on http://localhost:8080 (user: guest, pass: guest).
- Stop the consumer with `docker compose stop consumer`, send some messages with curl and start it again with
`docker compose start consumer`.
- Send a bunch of messages in a loop with
```while true;do  curl http://localhost:8000/say -X POST -H 'content-type: application/ld+json' -d '{"message": "Hello, World!"}';done```
and check what happens.

