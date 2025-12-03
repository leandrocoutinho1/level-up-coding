# Makefile

.PHONY: test phpstan pint

PHPUNIT = ./vendor/bin/phpunit
PHPSTAN = ./vendor/bin/phpstan
PINT = docker compose run --rm php-cli ./vendor/bin/pint

# Rodar os testes
test:
	@$(PHPUNIT) tests

# Analisar com PHPStan
phpstan:
	@$(PHPSTAN) analyse src tests

# Corrigir e formatar código com Pint
pint:
	@$(PINT) --config=pint.json
