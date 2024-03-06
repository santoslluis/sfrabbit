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
- Get the chat id with `curl https://api.telegram.org/<bot-api-key>/getMessages`
- Set up the `TG_API_KEY` and `TG_CHAT_ID` variables in `.env.local`
- Run the api with `docker compose up`

## Usage
```curl http://localhost:8000/say -X POST -H 'application/json' -d {"message": "Hello, World!"}```

This will make your bot send a message to yourself.

