# Agent Guide: vShip PHP SDK

## Env
- PHP 8.1-8.4 req.
- `composer install` for deps.

## Code
- PSR-4 `Vship\` -> `src/`.
- Pint style: `./vendor/bin/pint`.
- PHPStan L6: `./vendor/bin/phpstan analyse`.
- PHPCS: `./vendor/bin/phpcs src`.

## Test
- PHPUnit: `vendor/bin/phpunit`.
- Path: `src/Tests/Cases/`.
- Suffix: `Test.php`.
- Namespace: `Vship\Tests\Cases`.
- Utils: `Vship\Tests\Utils::getFixtureJson()` for JSON.

## CI/Check
- **Must**: Run PHPStorm inspections first, then GrumPHP.
- **Note**: GrumPHP checks staged files; `git add` before run.
- PHPStorm MCP: use for nav/refactor and inspections if available.
- GrumPHP: `vendor/bin/grumphp run`.
