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
- GrumPHP: `vendor/bin/grumphp run`.
- **Note**: GrumPHP checks staged files; `git add` before run.
- **Tools**: Use PHPStorm MCP for nav/refactor and other things it is capable of if available.
- **Must**: Check PHPStorm inspections + GrumPHP pass before submit.
