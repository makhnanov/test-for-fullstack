CMD=cd laradock && docker compose
run-up:
	$(CMD) up -d nginx mysql phpmyadmin workspace
run-composer-install:
	$(CMD) exec workspace composer install
run-npm-i:
	$(CMD) exec workspace npm i
run-npm-watch:
	$(CMD) exec workspace npm run watch-poll
run-workspace:
	$(CMD) exec workspace bash
run-migrate:
	$(CMD) exec workspace php artisan migrate
run-seed:
	$(CMD) exec workspace php artisan db:seed
