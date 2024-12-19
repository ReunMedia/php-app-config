<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

use Psr\Http\Server\MiddlewareInterface;

interface AppMiddlewareInterface
{
    /**
     * @return MiddlewareInterface[]
     */
    public static function getMiddleware(): array;
}
