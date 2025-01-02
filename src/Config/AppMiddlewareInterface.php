<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

use Psr\Http\Server\MiddlewareInterface;

/**
 * @deprecated 0.4.1 Middleware should be handled in application configuration.
 * An implementation can be found in `reun/php-app-definitions`.
 */
interface AppMiddlewareInterface
{
    /**
     * @return MiddlewareInterface[]
     */
    public static function getMiddleware(): array;
}
