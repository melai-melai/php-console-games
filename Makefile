install:
	composer install

console:
	psysh --config psysh.php

lint:
	composer run-script phpcs	-- --standard=PSR12 src #tests

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src #tests

test:
	composer run-script phpunit tests

.PHONY: test log