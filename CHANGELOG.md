# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.0] - 2026-04-24

### Added
- GitHub Actions CI workflow and dependency/security scan hook.
- Shipment response fixtures and test coverage for multiple payload variants.

### Removed
- Removed webhook support, including the public client API, webhook utilities, DTOs, enums, tests, and fixtures.

### Changed
- `OrganisationObjectSettings.data` is now an array.
- `Address.type` now accepts `int|string|null`, and `Address.line` is available for API payloads that provide it.
- `Util` now allows permissive types during object mapping to better match upstream API payloads.
- `ManageShipmentsTest` now covers `getShipment()` and uses shared mock setup for shipment responses.
- Downgraded PHPUnit support to `^10.5`.
- Updated CI and GrumPHP configuration to include PHPStan, PHPUnit, Rector, Pint, and external security checks.

## [2.2.0] - 2026-03-04

### Added
- PHP 8.4 support.
- Configured **PHP_CodeSniffer** with `PHPCompatibility` ruleset for cross-version compatibility checks.
- Configured **Rector** for automated code upgrades and quality improvements.
- Configured **GrumPHP** to run quality checks before commits.
- Added `@return class-string` to `ObjectType::getClass()` for better static analysis.

### Changed
- Renamed `Resource` class to `BaseResource` and marked it as `abstract`.
- Refactored `BaseResource` and all resource classes to use PHP 8.0 constructor property promotion.
- Added explicit `null` default values to nullable properties in resource classes to comply with PHP 8.4 standards.
- Added explicit type hints to several methods in `Client` and `Util` classes.
- Improved PHPDoc annotations across the codebase for better IDE support and static analysis.
- Refactored `Util::convertToVshipObject` for improved readability and return type handling.
- Enhanced `UnexpectedResponseSchemaException::__toString()` for clearer error reporting.
- Updated `rector.php` configuration to target PHP 8.1 and include PHP 8.4 rule sets.
- Updated `composer.json` to include PHP 8.4 in supported versions.

### Removed
- `UPGRADE.md` (was empty and redundant).
- Redundant PHPDoc `@param` and `@return` tags where native type hints are now present.
