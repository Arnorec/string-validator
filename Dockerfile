FROM ubuntu:16.04

RUN apt-get update && apt-get upgrade -y && apt-get install -y php git unzip

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer;

COPY . /var/www/string-validator