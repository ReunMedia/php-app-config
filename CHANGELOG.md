# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and [Common Changelog](https://common-changelog.org/), and this project adheres
to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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

[0.2.0]: https://github.com/Reun-Media/php-app-config/releases/tag/0.2.0
[0.1.0]: https://github.com/Reun-Media/php-app-config/releases/tag/0.1.0
