json:
	php -r 'echo json_encode(require "data/iso4217.php", JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);' > "data/iso4217.json"
