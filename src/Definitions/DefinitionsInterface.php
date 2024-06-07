<?php

declare(strict_types=1);

namespace Reun\Cms\Common\App\Definitions;

use Reun\PhpAppConfig\Config\AbstractAppConfig;

interface DefinitionsInterface
{
    public static function getDefinitions(AbstractAppConfig $config): array;
}
