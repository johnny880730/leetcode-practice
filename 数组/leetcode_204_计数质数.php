<?php
/*
204. 计数质数
统计所有小于非负整数 n 的质数的数量。

示例 1：
输入：n = 10
输出：4
解释：小于 10 的质数一共有 4 个, 它们是 2, 3, 5, 7 。

示例 2：
输入：n = 0
输出：0

示例 3：
输入：n = 1
输出：0


提示：
0 <= n <= 5 * 106


https://leetcode-cn.com/problems/count-primes/
*/

$n = 10;
var_dump((new Solution204())->countPrimes($n));

class Solution204
{

    /*
     * 厄拉多塞筛法: 如果 x 是质数，那么大于 x 的 倍数 2x,3x…… 一定不是质数
     * 用$isPrime[i] 表示数 i 是不是质数，如果是质数则为 1，否则为 0
     *
     * 再优化：
     * 对于一个质数 x，如果按从 2x 开始标记其实是冗余的，
     * 应该直接从 x⋅x 开始标记，因为 2x,3x,… 这些数一定在 x 之前就被其他数的倍数标记过了
     *
     */
    function countPrimes($n)
    {
        $isPrime = array_fill(2, $n-1, 1);
        $res = 0;
        for ($i = 2; $i < $n; $i++) {
            if ($isPrime[$i] == 1) {
                $res++;
                if ($i * $i < $n) {
                    for ($j = $i * $i; $j < $n; $j+=$i) {
                        $isPrime[$j] = 0;
                    }
                }
            }
        }
        return $res;
    }


}
