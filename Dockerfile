FROM debian:bookworm

# Installing some deps
RUN apt update && apt install -y curl

# Installing symfony and composer
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install -y symfony-cli composer php php-xml php-amqp

RUN mkdir /.symfony5 /.composer && chmod 777 /.symfony5 /.composer

WORKDIR /code