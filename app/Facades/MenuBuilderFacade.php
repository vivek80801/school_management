<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MenuBuilderFacade extends Facade
{
    /**
     * @method static void log(string $name)
     */
    protected static function getFacadeAccessor(): string
    {
        return 'menubuilder';
    }
}
