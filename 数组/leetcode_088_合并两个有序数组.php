<?php
/*
88. 合并两个有序数组
给你两个有序整数数组 nums1 和 nums2，请你将 nums2 合并到 nums1 中，使 nums1 成为一个有序数组。

初始化 nums1 和 nums2 的元素数量分别为 m 和 n 。你可以假设 nums1 的空间大小等于 m + n，这样它就有足够的空间保存来自 nums2 的元素。

示例 1：
输入：nums1 = [1,2,3,0,0,0], m = 3, nums2 = [2,5,6], n = 3
输出：[1,2,2,3,5,6]


示例 2：
输入：nums1 = [1], m = 1, nums2 = [], n = 0
输出：[1]

https://leetcode-cn.com/problems/merge-sorted-array/


*/
$nums1 = [1,2,3,0,0,0];
$nums2 = [2, 5, 6];
$m = 3;
$n = 3;
(new Solution088())->merge($nums1, $m, $nums2, $n);
var_dump($nums1);


class Solution088
{
    // 先合并后排序 不知道为何leetcode判题系统会通不过
    function merge(&$nums1, $m, $nums2, $n)
    {
        for ($i = 0; $i < $n; $i++) {
            $nums1[$m+$i] = $nums2[$i];
        }
        sort($nums1);
    }
}
