<?php
/*
448. 找到所有数组中消失的数字
给你一个含 n 个整数的数组 nums ，其中 nums[i] 在区间 [1, n] 内。请你找出所有在 [1, n] 范围内但没有出现在 nums 中的数字，并以数组的形式返回结果。



示例 1：
输入：nums = [4,3,2,7,8,2,3,1]
输出：[5,6]

示例 2：
输入：nums = [1,1]
输出：[2]


提示：

n == nums.length
1 <= n <= 105
1 <= nums[i] <= n
进阶：你能在不使用额外空间且时间复杂度为 O(n) 的情况下解决这个问题吗? 你可以假定返回的数组不算在额外空间内。

https://leetcode-cn.com/problems/find-all-numbers-disappeared-in-an-array/

*/

$arr =  [4,3,2,7,8,2,3,1];
print_r((new Solution448())->findDisappearedNumbers($arr));

class Solution448
{
    /*
     * 因为正常的情况 1 2 3 4，对应的下标是 0 1 2 3,可以看出值跟下标相差1;
     * 所以把$nums数组进行循环，让值减一把对应的下标改成负数,如果有的值为正数，说明没有对该下标进行操作
     * 又因差值为1，则返回 正数下标 + 1。
     */
    function findDisappearedNumbers($nums)
    {
        foreach ($nums as $k => $v) {
            $nums[$v-1] = $v * - 1;
        }
        $ans = [];
        foreach ($nums as $k => $v) {
            if ($v > 0) $ans[] = $k + 1;
        }
        return $ans;

    }

}
