<?php
/*
219. 存在重复元素 II
给定一个整数数组和一个整数 k，判断数组中是否存在两个不同的索引 i 和 j，使得 nums [i] = nums [j]，并且 i 和 j 的差的 绝对值 至多为 k。

示例 1:
输入: nums = [1,2,3,1], k = 3
输出: true

示例 2:
输入: nums = [1,0,1,1], k = 1
输出: true

示例 3:
输入: nums = [1,2,3,1,2,3], k = 2
输出: false

https://leetcode-cn.com/problems/contains-duplicate-ii/

*/

$arr = [1,2,3,1];
$k = 3;
//$arr = [1,2,3,1,2,3];
//$k = 2;
var_dump((new Solution219())->containsNearbyDuplicate2($arr, $k));

class Solution219
{
    // 线性搜索 超时
    function containsNearbyDuplicate($nums, $k)
    {
        for ($i = 0; $i < count($nums); $i++) {
            for ($j = 1; $j <= $k; $j++) {
                if (isset($nums[$i+$j]) && $nums[$i+$j] == $nums[$i]) {
                    return true;
                }
            }
        }
        return false;
    }

    /*
     * 利用哈希表：
     * 1、在散列表中搜索当前元素，如果找到了就返回 true。
     * 2、在散列表中插入当前元素。
     * 3、如果当前散列表的大小超过了 k， 删除散列表中最旧的元素。
     */
    function containsNearbyDuplicate2($nums, $k)
    {
        $hashMap = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (in_array($nums[$i], $hashMap)) {
                return true;
            }
            $hashMap[] = $nums[$i];
            if (count($hashMap) > $k) {
                unset($hashMap[$i - $k]);
            }
        }
        return false;

    }


}
