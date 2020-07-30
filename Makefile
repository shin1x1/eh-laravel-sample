.PHONY: install
install:
	test -z .env || cp -a .env.example .env
	docker-compose up -d
	docker-compose run --rm composer install
	docker-compose exec php ./artisan key:generate
	docker-compose exec php ./artisan migrate
	docker-compose exec php ./artisan db:seed
	make test

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

.PHONY: test
test:
	docker-compose run --rm php ./vendor/bin/phpunit
