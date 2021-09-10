<?php
/*
 * 打印一个字符串的全部排列
 */

$s = 'abc';
Code_StringAll::printAll($s);

class Code_StringAll
{
    public static function printAll($s)
    {
        $arr = str_split($s);
        self::f($arr, 0);
    }

    public static function f($arr, $i)
    {
        if ($i == count($arr)) {
            echo join('', $arr) . PHP_EOL;
            return;
        }
        for ($j = $i; $j < count($arr); $j++) {
            self::swap($arr, $i, $j);
            self::f($arr, $i+1);
        }
    }

    public static function swap(&$arr, $i, $j)
    {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }

}