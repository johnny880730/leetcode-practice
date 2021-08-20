<?php
/*
338. 比特位计数
给定一个非负整数 num。对于 0 ≤ i ≤ num 范围中的每个数字 i ，计算其二进制数中的 1 的数目并将它们作为数组返回。

示例 1:
输入: 2
输出: [0,1,1]

示例 2:
输入: 5
输出: [0,1,1,2,1,2]

进阶:

给出时间复杂度为O(n*sizeof(integer))的解答非常容易。但你可以在线性时间O(n)内用一趟扫描做到吗？
要求算法的空间复杂度为O(n)。
你能进一步完善解法吗？要求在C++或任何其他语言中不使用任何内置函数（如 C++ 中的 __builtin_popcount）来执行此操作。

https://leetcode-cn.com/problems/counting-bits/

*/

$n = 5;

var_dump((new Solution338())->countBits($n));

class Solution338
{
    /**
     * DP 思路：
     * 如果当前数字是偶数，则1的个数与当前数字 除以 2后数字的1的个数相同
     * 即 dp[i]=dp[i>>1]
     * 如果当前数字是奇数，则1的个数是当前数字 除以 2后数字的1 的个数 + 1
     * 即 dp[i]=dp[i>>1]+1
     *
     * 通过 i&1 可以判断奇偶性
     *
     * @param $n
     * @return mixed
     */
    public function countBits($n)
    {
        $dp = [];
        for ($i = 0; $i <= $n; $i++) {
            $dp[] = $dp[$i>>1] + ($i & 1);
        }
        return $dp;
    }

}
