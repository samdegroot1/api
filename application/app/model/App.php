<?php

namespace App\Model;

use App\Model\Concrete\AbstractModel;

class App extends AbstractModel
{
    public function __construct()
    {

    }

    public function run()
    {
        echo 'Hello world!';
    }

}