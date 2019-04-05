<?php
/**
 * PHPStorm addon to give our Core_Model factory usages autocompletion. See:
 * https://confluence.jetbrains.com/display/PhpStorm/PhpStorm+Advanced+Metadata
 */
namespace PHPSTORM_META
{
    $STATIC_METHOD_TYPES = [
        \Core\Model\ModelFactory::get('') => [
            "" == "\App\Models\@"
        ]
    ];
}