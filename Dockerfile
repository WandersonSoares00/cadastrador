FROM php:7.4-cli

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli

COPY . .

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]