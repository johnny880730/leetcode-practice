<?php
/*
 * 打印一个字符串的全部子序列，包括空字符串
 */

$s = 'abc';
Code_Subsquence::printSub($s);

class Code_Subsquence
{
    public static function printSub($s)
    {
        $arr = str_split($s);
        self::f($arr, 0, '');
    }

    public static function f($arr, $i, $pre)
    {
        if ($i == count($arr)) {
            if (!$pre == "") {
                echo $pre . PHP_EOL;
            }
            return;
        }
        self::f($arr, $i + 1, $pre . $arr[$i]);
        self::f($arr, $i + 1, $pre);
    }

}