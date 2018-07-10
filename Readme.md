1. git clone https://github.com/Arnorec/string-validator.git
2. cd string-validator
3. docker build -t string-validator .
4. docker run -it --rm string-validator 
5. cd /var/www/string-validator
6. composer install
7. ./vendor/bin/peridot specs 
