<?php

namespace Util;
/**
 * Class ArrayUtils
 *
 * Utility methods where php doesn't have a native function for.
 */
abstract class ArrayUtils
{
    /**
     * Copy the values from the given $data array filterey by the given $keys array to a new array
     *
     * @param array $data
     * @param array $keys
     *
     * @return array|false
     */
    public static function copyKeys(array $data, array $keys)
    {
        //reduce the data array its keys based on the given keys array
        $keys = array_combine($keys, $keys);
        $values = array_intersect_key(
            $data,
            $keys
        );

        //remove given keys which are not found in the source array
        $keys = array_intersect_key(
            $keys,
            $values
        );

        //ensure both array keys are sorted the same way sinces they'll be combined
        ksort($keys);
        ksort($values);

        //merge the two arrays to one array
        return array_combine(
            $keys,
            $values
        );
    }

    /**
     * Reduce the data set  based on the given keys.
     *
     * @param array $data
     * @param array $allowedKeys
     */
    public static function keepKeys(array &$data, array $allowedKeys)
    {
        $data = array_intersect_key($data, array_combine(
            $allowedKeys, $allowedKeys
        ));
    }

    /**
     * @param $data
     * @param $sumData
     * @param $sumKeys
     */
    public static function sumKeys(&$data, $sumData, $sumKeys)
    {
        foreach($sumKeys as $key) {

            if(!isset($ar1[$key]) || !isset($ar2[$key]))
                continue;

            $ar1[$key] += $ar2[$key];
        }
    }

    /**
     * Rearrange the order of the given data array.
     * First intersect the array keys to filter out possibly given keys which are not known in the data array.
     * Keys not specified in the arrangement array will ordered to the end of the array, after the keys of the given arrangement.
     *
     * @param array $data
     * @param array $arrangement
     */
    private function reArrangeKeys(array &$data, array $arrangement)
    {
        $arrangement = array_intersect_key(array_combine($arrangement, $arrangement), $data);
        $data = array_merge(array_flip(
            $arrangement
        ), $data);
    }

    /**
     * Sort multidimensional array by the given key
     * @note untested!
     *
     * @param $array
     * @param $key
     */
    public static function sortMultidimensional(&$array, $key)
    {
        usort($array, function($a, $b) { return $a[$key] <=> $b[$key];});
    }
}