<?php
/*
 * 给你一个二维数组，二维数组中的每个数都是正数。
 * 要求从左上角走到右下角，每一步只能向右或者向下。
 * 沿途经过的数字要累加起来。返回最小的路径和。
 */

$m = [
    [1, 3, 5, 9],
    [8, 1, 3, 4],
    [5, 0, 6, 1],
    [8, 8, 4, 0]
];
echo Code_MinPath::getMinPath($m);

class Code_MinPath
{
    public static function getMinPath($m)
    {
        if ($m == null || count($m) == 0 || $m[0] == null || count($m[0]) == 0) {
            return 0;
        }
        $row = count($m);
        $col = count($m[0]);
        $dp  = [];

        $dp[0][0] = $m[0][0];
        // 初始化最左列
        for ($i = 1; $i < $row; $i++) {
            $dp[$i][0] = $dp[$i - 1][0] + $m[$i][0];
        }
        // 初始化第一行
        for ($i = 1; $i < $col; $i++) {
            $dp[0][$i] = $dp[0][$i - 1] + $m[0][$i];
        }
        // dp
        for ($i = 1; $i < $row; $i++) {
            for ($j = 1; $j < $col; $j++) {
                $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1]) + $m[$i][$j];
            }
        }

        return $dp[$i - 1][$j - 1];
    }
}