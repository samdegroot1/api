<?php

namespace Core\Model;

abstract class ModelFactory
{
    private static $instances = [];

    /**
     * @param        $model
     * @param string $module
     * @param bool   $forceNew
     *
     * @return mixed
     * @throws \Exception
     */
    public static function get($model, $module = null, $forceNew = false)
    {
        $qualifiedName = '\\App\\Model\\' . ($module ? 'Modules\\' . $module . '\\' . $model : $model);

        if(!class_exists($qualifiedName, true)) {
            throw new \Exception("Class $model not found.");
        }

        $registerName = trim(strtolower($qualifiedName));

        if(isset(self::$instances[$registerName]) && !$forceNew) {
            return self::$instances[$registerName];
        }
        self::$instances[$registerName] = new $qualifiedName();

        return self::$instances[$registerName];
    }
}