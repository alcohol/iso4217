deps:
	composer install

json:
	php -r 'echo json_encode(require "data/iso4217.php", JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);' > "data/iso4217.json"

check:
	vendor/bin/phpcs -v --standard=PSR2 source/ tests/
	vendor/bin/phpmd source/ xml codesize,controversial,design,naming,unusedcode

test:
	vendor/bin/phpunit --strict
