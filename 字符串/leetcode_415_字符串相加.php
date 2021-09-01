<?php
/*
415. 字符串相加
给定两个字符串形式的非负整数 num1 和num2 ，计算它们的和。

提示：
num1 和num2 的长度都小于 5100
num1 和num2 都只包含数字 0-9
num1 和num2 都不包含任何前导零
你不能使用任何內建 BigInteger 库， 也不能直接将输入的字符串转换为整数形式

https://leetcode-cn.com/problems/add-strings/

*/

$num1 = '11'; $num2 = '123';
$num1 = '1'; $num2 = '9';
var_dump((new Solution415())->addStrings($num1, $num2));

class Solution415
{
    // 模拟数学的竖式计算加法
    function addStrings($num1, $num2)
    {
        $res = '';
        // 长度不一致的补齐前导0
        $len1 = strlen($num1);
        $len2 = strlen($num2);
        $len = $len1;
        if ($len1 > $len2) {
            $num2 = str_pad($num2, $len1, '0', STR_PAD_LEFT);
        } else if ($len1 < $len2) {
            $num1 = str_pad($num1, $len2, '0', STR_PAD_LEFT);
            $len = $len2;
        }
        // 从后往前开始计算
        $i = $j = $len - 1;
        $carry = 0;
        while ($i >= 0 or $j >= 0) {
            $a = intval($num1[$i]);
            $b = intval($num2[$j]);
            $tmp = $a + $b + $carry;
            $carry = intval($tmp / 10);
            $res = strval($tmp % 10) . $res;
            $i--;
            $j--;
        }
        return $carry > 0 ? '1'.$res : $res;
    }




}
