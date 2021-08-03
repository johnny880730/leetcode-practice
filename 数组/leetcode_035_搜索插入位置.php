<?php
/*
35. 搜索插入位置

给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。

你可以假设数组中无重复元素。

示例 1:

输入: [1,3,5,6], 5
输出: 2
示例2:

输入: [1,3,5,6], 2
输出: 1
示例 3:

输入: [1,3,5,6], 7
输出: 4
示例 4:

输入: [1,3,5,6], 0
输出: 0

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/search-insert-position
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


*/
$a = [1,3,5,6];
$b = 5;
$o = new Solution035();
//print_r($o->searchInsert($a, $b));
print_r($o->searchInsert2($a, $b));

class Solution035 {

    /**
     * @param Integer $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $cnt = count($nums);
        if (in_array($target, $nums)) {
            return array_search($target, $nums);
        }
        if ($target < $nums[0]) {
            return 0;
        }
        if ($target > $nums[$cnt - 1]) {
            return $cnt;
        }

        for ($i = 0; $i < $cnt; $i++) {
            if ($nums[$i] < $target && $nums[$i + 1] > $target) {
                return $i + 1;
            }
        }
    }

    // 二分
    function searchInsert2($nums, $target)
    {
        $len = count($nums);
        if ($target < $nums[0]) {
            return 0;
        }
        if ($target > $nums[$len - 1]) {
            return $len;
        }

        $l = 0;
        $r = $len - 1;
        while ($l <= $r) {
            $mid = $l + intval(($r - $l) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            } else if ($nums[$mid] > $target) {
                $r = $mid - 1;
            } else if ($nums[$mid] < $target) {
                $l = $mid + 1;
            }
        }
        return $l;
    }
}
