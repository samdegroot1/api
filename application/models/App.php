<?php

namespace App\Models;

use App\Models\Concrete\AbstractModel;

class App extends AbstractModel
{
    public function __construct()
    {

    }

    public function test()
    {
        echo 'Factory working';
    }
}