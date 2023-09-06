PHP_CONTAINER := calc_test_php

build:
	cp app/.env.dist app/.env.local
	cp docker-compose.override.yml.dist docker-compose.override.yml
	docker-compose up -d
	docker exec ${PHP_CONTAINER} composer install

rebuild:
	docker-compose up -d --build

test:
	docker exec ${PHP_CONTAINER} bin/phpunit


analyze:
	docker exec ${PHP_CONTAINER} vendor/bin/php-cs-fixer fix --using-cache=no
	docker exec ${PHP_CONTAINER} vendor/bin/psalm --no-cache


check: analyze test