<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

abstract class AbstractAppConfig
{
    final public const DEV = "dev";
    final public const PROD = "prod";

    final public const SAPI_WEB = "web";
    final public const SAPI_CLI = "cli";

    /**
     * Project root directory.
     *
     * Uses `getcwd()` by default.
     */
    public string $projectRoot;

    /**
     * Data directory path. Data stored in this directory is not persisted
     * between deployments. Use `$sharedDataDirectory` if you need to persist
     * data between deployments.
     *
     * Default: "$projectRoot/_data".
     */
    public string $dataDirectory;

    /**
     * Shared data directory path. Data stored in this directory is persisted
     * between deployments.
     *
     * Changing this directory after initial deployment is not recommended.
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
    public string $phpLocale = "en_US.UTF-8";

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
        $this->projectRoot = getcwd() ?: "";
        $this->dataDirectory = "{$this->projectRoot}/_data";
        $this->sharedDataDirectory = "{$this->projectRoot}/_data-shared";
        $this->cacheDirectory = "{$this->dataDirectory}/cache";
        $this->webroot = "{$this->projectRoot}/www";
        $this->buildMetaDirectory = "{$this->projectRoot}/_build-meta";

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
