init: docker-clear docker-up api-composer api-migration ui-install ui-build

up: docker-up

docker-clear:
	docker-compose down --remove-orphans
	sudo rm -rf api/var/docker

docker-up:
	docker-compose up --build -d

api-composer:
	docker-compose exec php-cli composer install

api-cli:
	docker-compose exec php-cli /bin/bash

api-gen-rsa:
	docker-compose exec api-cli openssl genrsa -out private.key 2048
	docker-compose exec api-cli openssl rsa -in private.key -pubout -out public.key

api-composer-autoload:
	docker-compose exec php-cli composer dump-autoload

api-migration:
	docker-compose exec php-cli php -r db/UsersMigration.php

api-test:
	docker-compose exec php-cli vendor/bin/phpunit

ui-install:
	docker-compose exec node npm install

ui-build:
	docker-compose exec node npm run build