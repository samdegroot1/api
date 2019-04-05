<?php

namespace Core\Model;

class CoreModel
{
    private static $_instances = [];

    /**
     * App constructor.
     */
    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @param        $model
     * @param string $module
     * @param bool   $forceNew
     *
     * @return mixed
     * @throws \Exception
     */
    public static function factory($model, $module = null, $forceNew = false)
    {
        $qualifiedName = '\\App\\Model\\' . ($module ? $module . '\\' . $model : $model);

        if(!class_exists($qualifiedName, true)) {
            throw new \Exception("Class $model not found.");
        }

        $registerName = trim(strtolower($qualifiedName));

        if(isset(self::$_instances[$registerName]) && !$forceNew) {
            return self::$_instances[$registerName];
        }
        self::$_instances[$registerName] = new $qualifiedName();

        return self::$_instances[$registerName];
    }
}