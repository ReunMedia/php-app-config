<?php

declare(strict_types=1);

namespace Reun\PhpAppConfig\Config;

interface DefinitionsInterface
{
    /**
     * @return array<class-string,mixed>
     */
    public static function getDefinitions(): array;
}
