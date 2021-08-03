<?php
/*
485. 最大连续 1 的个数
给定一个二进制数组， 计算其中最大连续 1 的个数。



示例：

输入：[1,1,0,1,1,1]
输出：3
解释：开头的两位和最后的三位都是连续 1 ，所以最大连续 1 的个数是 3.


提示：

输入的数组只包含 0 和 1 。
输入数组的长度是正整数，且不超过 10,000。

https://leetcode-cn.com/problems/max-consecutive-ones/

*/

$arr =  [1,1,0,1,1,1];
print_r((new Solution485())->findMaxConsecutiveOnes($arr));

class Solution485
{
    function findMaxConsecutiveOnes($nums)
    {
        $len = count($nums);
        $res = 0;
        $cur = 0;
        for ($i = 0; $i < $len; $i++) {
            echo 'i = '.$i.PHP_EOL;
            if ($nums[$i] == 0) {
                $cur = 0;
            } else {
                $cur++;
            }
            $res = max($res, $cur);
            echo 'cur = ' . $cur. PHP_EOL;
            echo '========================'.PHP_EOL;
        }
        return $res;

    }

}
