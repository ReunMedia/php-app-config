# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and [Common Changelog](https://common-changelog.org/), and this project adheres
to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.4.1] - 2025-01-02

### Changed

- Deprecate `AppMiddlewareInterface`. Middleware should be handled in
  application configuration. An implementation can be found in
  [reun/php-app-definitions](https://github.com/Reun-Media/php-app-definitions).

## [0.4.0] - 2024-12-19

### Changed

- **Breaking:** `AbstractAppConfig` constants (`DEV`, `PROD`, `SAPI_*`) are now
  `final`. They shouldn't have been overridden anyway, but if you did, you now
  get an error.

### Added

- Add `AppMiddlewareInterface` that can be used to define application middleware

### Fixed

- `AbstractAppConfig` now throws an exception if `getcwd()` fails to set project
  root directory. Previously it just silently set it to `""`, which caused
  unexpected behaviour.

## [0.3.0] - 2024-11-21

First public release.

## [0.2.0] - 2024-10-15

### Added

- Add `RoutesInterface`

### Changed

- **Breaking:** Change default locale from `fi_FI` to `en_US`
- **Breaking:** Change `DefinitionsInterface` namespace from `Reun\PhpAppConfig\Definitions` to `Reun\PhpAppConfig\Config`
- **Breaking:** `AbstractAppConfig` no longer extends `ArrayAccess`
- **Breaking:** Bump minimum required PHP version to `8.3`
- Update `AbstractAppConfig` CLI and env detection

### Removed

- **Breaking:** Remove Windows-specific locale fallback

## [0.1.0] - 2024-06-07

Initial release based on `reun/cms-common`.

[0.4.1]: https://github.com/Reun-Media/php-app-config/releases/tag/0.4.1
[0.4.0]: https://github.com/Reun-Media/php-app-config/releases/tag/0.4.0
[0.3.0]: https://github.com/Reun-Media/php-app-config/releases/tag/0.3.0
[0.2.0]: https://github.com/Reun-Media/php-app-config/releases/tag/0.2.0
[0.1.0]: https://github.com/Reun-Media/php-app-config/releases/tag/0.1.0
