init: docker-clear docker-up api-composer api-migration ui-install ui-build

up: docker-up

docker-clear:
	docker-compose down --remove-orphans
	sudo rm -rf api/var/docker

docker-up:
	docker-compose up --build -d

api-composer:
	docker-compose exec php-cli composer install

api-composer-autoload:
	docker-compose exec php-cli composer dump-autoload

api-migration:
	docker-compose exec php-cli php -r db/UsersMigration.php

ui-install:
	docker-compose exec node npm install

ui-build:
	docker-compose exec node npm run build