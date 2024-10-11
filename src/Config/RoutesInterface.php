<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

use Psr\Container\ContainerInterface;
use Slim\Interfaces\RouteCollectorProxyInterface;

interface RoutesInterface
{
    /**
     * @param RouteCollectorProxyInterface<ContainerInterface> $group
     */
    public static function registerRoutes(RouteCollectorProxyInterface $group): void;
}
