<?php
namespace D4v\JWT\Facades;

use Illuminate\Support\Facades\Facade;

class JWT extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'd4vjwt';
    }
}
