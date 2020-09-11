.PHONY: install
install:
	test -z .env || cp -a .env.example .env
	docker-compose up -d
	docker-compose run --rm composer install --prefer-dist --no-progress --no-suggest
	docker-compose exec -T php ./artisan key:generate
	docker-compose exec -T php ./artisan migrate
	docker-compose exec -T php ./artisan db:seed
	make test

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

.PHONY: test
test:
	docker-compose exec -T php ./vendor/bin/phpunit
