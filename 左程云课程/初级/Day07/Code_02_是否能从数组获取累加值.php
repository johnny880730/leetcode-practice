<?php
/*
 * 给你一个数组arr（都正数），和一个整数aim。
 * 如果可以任意选择arr中的数字，能不能累加得到aim，
 * 返回true或者false
 */

$arr = [1, 4, 8];
$aim = 16;
var_dump(Code_GetAimFromArr::getAim1($arr, $aim));
var_dump(Code_GetAimFromArr::getAim2($arr, $aim));

class Code_GetAimFromArr
{
    // 递归
    public static function getAim1($arr, $aim)
    {
        return self::process1($arr, 0, 0, $aim);
    }

    // 每次取一个数字，区分成要这个数字 和 不要这个数字 两种状态，有一种符合就返回true
    public static function process1($arr, $i, $sum, $aim)
    {
        if ($i == count($arr)) {
            return $sum == $aim;
        }
        return self::process1($arr, $i + 1, $sum, $aim)
            || self::process1($arr, $i + 1, $sum + $arr[$i], $aim);
    }

    /*
     * DP 根据数组和开辟一个二维数组。最后一行的第$aim列就是aim所在设为true，其他假定为false
     * 就是有点耗空间
     * 从倒数第二行由下往上遍历：
     * dp[i][j] 由两个因素决定：
     * 1、它的正下方一格A（表示未采用arr[i]值）
     * 2、A往右走arr[i]步后的格子来决定（表示采纳了arr[i]值）
     * 两者只要有一个为true就是true
     */
    public static function getAim2($arr, $aim)
    {
        $len = count($arr);
        $sum = array_sum($arr);
        $dp = array_fill(0, $len+1, array_fill(0, $sum+1, false));
        $dp[$len][$aim] = true;
        for($i = $len-1; $i >= 0; $i--) {
            for ($j = $sum; $j >= 0; $j--) {
                $num = $arr[$i];
                $dp[$i][$j] = $dp[$i+1][$j];
                if (isset($dp[$i+1][$j+$num])) {
                    $dp[$i][$j] =  $dp[$i+1][$j] || $dp[$i+1][$j+$num];
                }
            }
        }
        return $dp[0][0];
    }
}