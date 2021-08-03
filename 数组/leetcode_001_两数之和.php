<?php
/*
给定一个整数数组和一个目标值，找出数组中和为目标值的两个数。
你可以假设每个输入只对应一种答案，且同样的元素不能被重复利用。
示例:
给定 nums = [2, 7, 11, 15], target = 9
因为 nums[0] + nums[1] = 2 + 7 = 9
所以返回 [0, 1]
*/

$nums = [3,2,4];
$target = 6;
$o = new Solution001();
print_r($o->twoSum($nums, $target));

class Solution001 {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target)
    {
        $found = [];
        foreach ($nums as $key => $val) {
            $diff = $target - $val;
            if (isset($found[$diff])) {
                return [$found[$diff], $key];
            } else {
                $found[$val] = $key;
            }

        }
        return [-1, -1];
    }

}
