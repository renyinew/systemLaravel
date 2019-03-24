<?php
namespace Noecs\Alicloud\Facades;

use Illuminate\Support\Facades\Facade;

class Alicloud extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'alicloud';
    }
}