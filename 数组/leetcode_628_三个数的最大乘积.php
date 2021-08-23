<?php
/*
628. 三个数的最大乘积
给你一个整型数组 nums ，在数组中找出由三个数组成的最大乘积，并输出这个乘积。

示例 1：
输入：nums = [1,2,3]
输出：6

示例 2：
输入：nums = [1,2,3,4]
输出：24

示例 3：
输入：nums = [-1,-2,-3]
输出：-6


提示：
3 <= nums.length <= 104
-1000 <= nums[i] <= 1000

https://leetcode-cn.com/problems/maximum-product-of-three-numbers/

*/

$arr = [5, 4, 3, 2, 1];
print_r((new Solution628())->maximumProduct($arr));

class Solution628
{
    /*
     * 先排序
     * 1、若全是非负数，最大三个数相乘即为所求
     * 2、若全是非整数，最大三个数相乘即为所求
     * 3、有正有负，可能是最大三个正数的乘积，或者是两个最小负数+最大正数的乘积
     * 总结：比较三个最大正数乘积 和 两个最小负数+最大正数
     */
    function maximumProduct($nums)
    {
        sort($nums);
        $len = count($nums);
        return max(
            $nums[0] * $nums[1] * $nums[$len - 1],
            $nums[$len - 1] * $nums[$len - 2] * $nums[$len - 3]
        );
    }

}
