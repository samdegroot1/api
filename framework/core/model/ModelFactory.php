<?php

namespace Core\Model;

abstract class ModelFactory
{
    private static $_instances = [];

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
        $qualifiedName = '\\App\\Models\\' . ($module ? 'Modules\\' . $module . '\\' . $model : $model);

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