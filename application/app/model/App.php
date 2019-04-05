<?php

namespace App\Model;

use App\Model\Concrete\AbstractModel;

class App extends AbstractModel
{
    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        echo 'Hello world!';
    }

}