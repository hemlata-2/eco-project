<?php

namespace app\Test\Facades;

use Illuminate\Support\Facades\Facade;

class TestFacades1 extends Facade {
   protected static function getFacadeAccessor() { 
       return 'test'; 
    }
}