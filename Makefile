.PHONY: all check clean test

all: vendor check test

check:
	vendor/bin/phpcs -v --standard=PSR2 source/

clean:
	rm -rf vendor

test:
	vendor/bin/phpunit --strict --testdox

vendor:
	composer install
