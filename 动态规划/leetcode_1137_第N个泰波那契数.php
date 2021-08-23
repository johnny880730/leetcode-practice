<?php
/*
1137. 第 N 个泰波那契数
泰波那契序列 Tn 定义如下：

T0 = 0, T1 = 1, T2 = 1, 且在 n >= 0 的条件下 Tn+3 = Tn + Tn+1 + Tn+2

给你整数 n，请返回第 n 个泰波那契数 Tn 的值。



示例 1：
输入：n = 4
输出：4
解释：
T_3 = 0 + 1 + 1 = 2
T_4 = 1 + 1 + 2 = 4

示例 2：
输入：n = 25
输出：1389537


提示：

0 <= n <= 37
答案保证是一个 32 位整数，即 answer <= 2^31 - 1。

*/

$n = 25;

var_dump((new Solution1137())->tribonacci($n));
var_dump((new Solution1137())->tribonacci2($n));

class Solution1137
{
    /**
     * DP
     * @param Integer[] $cost
     * @return Integer
     */
    function tribonacci($n)
    {
        $dp = [0, 1, 1];
        if ($n <= 2) {
            return $dp[$n];
        }
        for ($i = 3; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 3] + $dp[$i - 2] + $dp[$i - 1];
        }
        return $dp[$n];
    }

    // 空间复杂度更好
    function tribonacci2($n)
    {
        $a = 0;
        $b = 1;
        $c = 1;
        if ($n == 0) {
            return $a;
        }
        if ($n <= 2) {
            return $c;
        }
        for ($i = 3; $i <= $n; $i++) {
            $tmp = $c;
            $c = $a + $b + $c;
            $a = $b;
            $b = $tmp;
        }
        return $c;
    }

}
