### Build/Configuration Instructions

- **PHP Version**: Requires PHP 8.1, 8.2, 8.3, or 8.4.
- **Dependencies**: Managed via Composer. Run `composer install` to set up the development environment.
- **Extensions**: Requires `ext-json`.
- **API Key**: For development and testing, you will need a vShip API key. By default, the SDK uses the sandbox URL: `https://api-dev.vship.dev/`.

### Testing Information

- **Configuration**: PHPUnit is configured in `phpunit.xml`. Tests are located in `src/Tests`.
- **Running Tests**: Execute `vendor/bin/phpunit` from the project root.
- **Adding New Tests**:
  - Place new test classes in `src/Tests/Cases/`.
  - Use the `Test.php` suffix for test files.
  - While existing tests use the `Cases\` namespace, it is recommended to use `Vship\Tests\Cases` for proper PSR-4 compliance.
  - **Fixtures**: Use `Vship\Tests\Utils::getFixture()` or `getFixtureJson()` to load JSON data from `src/Tests/fixtures/`.
  - **Traits**: Use `Vship\Tests\Traits\TestsWebhooks` for webhook-related test helpers.

#### Simple Test Example
```php
<?php

declare(strict_types=1);

namespace Vship\Tests\Cases;

use PHPUnit\Framework\TestCase;

class SimpleDemoTest extends TestCase
{
    public function testSimple(): void
    {
        $this->assertTrue(true);
    }
}
```

### Additional Development Information

- **Code Style**: The project follows the `per` preset using **Laravel Pint**.
  - Run `./vendor/bin/pint` to fix code style issues.
- **Static Analysis**: **PHPStan** is used for static analysis (Level 6).
  - Run `./vendor/bin/phpstan analyse` to check for types and other issues.
- **Linting**: **PHP_CodeSniffer** is used with custom rules defined in `phpcs.xml`.
  - Run `./vendor/bin/phpcs src` to check for style violations.
- **Git Hooks**: **GrumPHP** is used to run these tools before commits. 
  - It is **mandatory** to run `vendor/bin/grumphp git:pre-commit` to test changes before submission or committing. Ensure changes are staged (`git add`) before running this command.
  - To run a full project coding standards scan, execute `vendor/bin/grumphp run` (recommended).
- **Autoloading**: The project uses PSR-4 autoloading with the `Vship\` prefix mapped to the `src/` directory.
