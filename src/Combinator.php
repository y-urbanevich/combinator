<?php

namespace Urbanevich;

/**
 * Class Combinator
 * Get all possible combinations from arrays.
 *
 * @author Yaroslav Urbanevich hhtp://exe.kh.ua
 */
class Combinator
{

    /**
     * @param array $arrays
     * @param bool $empty
     * @param bool $unique
     * @param int $depth
     * @param bool $count
     * @param bool $weight
     *
     * @return array
     *
     */
    public static function getCombs($arrays, $empty = false, $unique = false, $depth = -1, $count = false, $weight = false)
    {
        if ($depth == -1) {
            if ($empty || $unique) {
                $newArray = array();
                foreach ($arrays as $array) {
                    if ($empty) {
                        $array[] = '';
                    }
                    if ($unique) {
                        $array = array_unique($array, SORT_REGULAR);
                    }
                    $newArray[] = $array;
                }
                $arrays = $newArray;
            }
            $count  = count($arrays);
            $weight = array_fill(-1, $count + 1, 1);
            $q      = 1;
            foreach ($arrays as $i => $array) {
                $size       = count($array);
                $q          = $q * $size;
                $weight[$i] = $weight[$i - 1] * $size;
            }
            $result = array();
            for ($depth = 0; $depth < $q; $depth++) {
                $result[] = self::getCombs($arrays, $empty, $unique, $depth, $count, $weight);
            }
        } else {
            $stateArray = array_fill(0, $count, 0);

            for ($i = $count - 1; $i >= 0; $i--) {
                $stateArray[$i] = floor($depth / $weight[$i - 1]);
                $depth          = $depth - $stateArray[$i] * $weight[$i - 1];
            }

            $result = array();
            for ($i = 0; $i <= $count; $i++) {
                if (isset($stateArray[$i]) && isset($arrays[$i][$stateArray[$i]])) {
                    $result[$i] = $arrays[$i][$stateArray[$i]];
                }
            }
        }
        return $result;
    }
}