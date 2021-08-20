<?php
/*
53. 最大子序和
给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。

示例 1：
输入：nums = [-2,1,-3,4,-1,2,1,-5,4]
输出：6
解释：连续子数组 [4,-1,2,1] 的和最大，为 6 。

示例 2：
输入：nums = [1]
输出：1

示例 3：
输入：nums = [0]
输出：0

示例 4：
输入：nums = [-1]
输出：-1

示例 5：
输入：nums = [-100000]
输出：-100000

提示：

1 <= nums.length <= 3 * 104
-105 <= nums[i] <= 105

https://leetcode-cn.com/problems/maximum-subarray/

*/

$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$nums = [5,4,-1,7,8];


var_dump((new Solution053())->maxSubArray($nums));

class Solution053
{
    public function maxSubArray($nums)
    {
        $len = count($nums);
        if ($len <= 1) {
            return $nums[0];
        }
        $pre = 0;
        $max = $nums[0];
        foreach ($nums as $x) {
            $pre = max($pre + $x, $x);
            $max = max($max, $pre);
            echo "x = $x, pre = $pre, max = $max" . PHP_EOL;
        }
        return $max;
    }



}
