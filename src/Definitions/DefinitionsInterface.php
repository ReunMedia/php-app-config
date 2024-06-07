<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

interface DefinitionsInterface
{
    public static function getDefinitions(AbstractAppConfig $config): array;
}
