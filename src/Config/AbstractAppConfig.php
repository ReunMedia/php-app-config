<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

abstract class AbstractAppConfig
{
    public const DEV = "dev";
    public const PROD = "prod";

    public const SAPI_WEB = "web";
    public const SAPI_CLI = "cli";

    /**
     * Project root directory. Uses `getcwd()` by default.
     */
    public string $projectRoot;

    /**
     * Data directory path. Data stored in this directory is not persisted between
     * deployments. Use `$sharedDataDirectory` if you need to persist data between
     * deployments.
     *
     * Default: "$projectRoot/_data".
     */
    public string $dataDirectory;

    /**
     * Shared data directory path. Data stored in this directory is persisted
     * between deployments.
     *
     * *WARNING: Changing this directory is not recommended, since the deployment
     * script will still only consider `_data-shared` as the only shared
     * directory.*
     *
     * Default: "$projectRoot/_data-shared"
     */
    public string $sharedDataDirectory;

    /**
     * Path to build metadata directory.
     *
     * Default: "$projectRoot/_build-meta"
     */
    public string $buildMetaDirectory;

    /**
     * Cache directory path.
     *
     * Default: "$dataDirectory/cache".
     */
    public string $cacheDirectory;

    /**
     * Webroot path.
     *
     * Default: "$projectRoot/www".
     */
    public string $webroot;

    /**
     * PHP locale.
     */
    public string $phpLocale = "fi_FI.UTF-8";

    /**
     * PHP locale on Windows. Replaces `$phpLocale` with this value when running
     * on Windows. This variable must be set because the locale values are
     * different on Windows. @see https://www.php.net/manual/en/function.setlocale.php.
     */
    public string $phpLocaleWindows = "fin";

    /**
     * Default timezone. It is highly recommended to use UTC and only convert to
     * local timezone when displaying dates.
     */
    public string $defaultTimezone = "UTC";

    /**
     * Project environment. Either `dev` or `prod`.
     *
     * @var "dev"|"prod"
     */
    public string $projectEnv = self::PROD;

    /**
     * SAPI mode. Either `web` or `cli`.
     *
     * @var self::SAPI_*
     */
    public string $sapiMode = self::SAPI_CLI;

    public function __construct()
    {
        // Setup directories.
        $this->projectRoot = getcwd();
        $this->dataDirectory = "{$this->projectRoot}/_data";
        $this->sharedDataDirectory = "{$this->projectRoot}/_data-shared";
        $this->cacheDirectory = "{$this->dataDirectory}/cache";
        $this->webroot = "{$this->projectRoot}/www";
        $this->buildMetaDirectory = "{$this->projectRoot}/_build-meta";

        // Detect if running on Windows and change locale.
        if ("WIN" === strtoupper(substr(\PHP_OS, 0, 3))) {
            $this->phpLocale = $this->phpLocaleWindows;
        }

        // Check if running in CLI mode
        $this->sapiMode = \PHP_SAPI == "cli"
            ? static::SAPI_CLI
            : static::SAPI_WEB;

        // Set dev if running in CLI or hostname is localhost
        if ($this->sapiMode === static::SAPI_CLI
            || \PHP_SAPI == "cli-server"
            || \in_array($_SERVER["REMOTE_ADDR"], ["127.0.0.1", "::1"])
        ) {
            $this->projectEnv = static::DEV;
        }
    }

    /**
     * Returns `true` in development environment.
     */
    public function isDev(): bool
    {
        return static::DEV === $this->projectEnv;
    }
}
