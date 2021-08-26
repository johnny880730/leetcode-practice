<?php
/*
922. 按奇偶排序数组 II
给定一个非负整数数组 A， A 中一半整数是奇数，一半整数是偶数。

对数组进行排序，以便当 A[i] 为奇数时，i 也是奇数；当 A[i] 为偶数时， i 也是偶数。

你可以返回任何满足上述条件的数组作为答案。

示例：
输入：[4,2,5,7]
输出：[4,5,2,7]
解释：[4,7,2,5]，[2,5,4,7]，[2,7,4,5] 也会被接受。


提示：
2 <= A.length <= 20000
A.length % 2 == 0
0 <= A[i] <= 1000

https://leetcode-cn.com/problems/sort-array-by-parity-ii/

*/

$arr = [4,2,5,7];
print_r((new Solution905())->sortArrayByParityII($arr));

class Solution905
{
    protected $m = 0;
    protected $n = 0;
    protected $len = 0;

    // 利用位运算计算奇偶性速度快
    function sortArrayByParityII($nums)
    {
        $this->len = count($nums);
        $res = [];
        for ($i = 0; $i < $this->len; $i++) {
            echo "i = {$i}".PHP_EOL;
            if ($i & 1) {
                $res[] = $this->getJiNum($nums);
            } else {
                $res[] = $this->getOuNum($nums);
            }
        }
        return $res;
    }

    function getJiNum($nums)
    {
        while ($this->m < $this->len) {
            if ($nums[$this->m] & 1) {
                $num = $nums[$this->m];
                $this->m++;
                return $num;
            }
            $this->m++;
        }
    }

    function getOuNum($nums)
    {
        while ($this->n < $this->len) {
            if ( ($nums[$this->n] & 1) == 0) {
                $num = $nums[$this->n];
                $this->n++;
                return $num;
            }
            $this->n++;
        }
    }
}
