<?php
// 归并排序
// 时间复杂度O(N*logN)，额外空间复杂度O(N)，实现可以做到稳定性
// 注意：
// 1，库函数中排序的实现是综合排序，比如插入+快速；比如为了稳定性，排序算法往往是快排+堆排序
// 2，归并排序和快速排序，都一定存在非递归的实现
// 3，归并排序，存在额外空间复杂度O(1)的实现，但是非常难，你不需要掌握
// 4，归并排序的扩展，小和问题，逆序对

$arr = [9, 8, 7, 6, 5, 4, 3, 2, 1];
$res = Code_MergeSort::MergeSort($arr);
print_r($res);

class Code_MergeSort
{
    public static function MergeSort($arr)
    {
        if ($arr == null || count($arr) < 2) {
            return $arr;
        }
        self::_mergeSort($arr, 0, count($arr) - 1);
        return $arr;
    }

    public static function _mergeSort(&$arr, $left, $right)
    {
        if ($left == $right) {
            return;
        }
        $mid = $left + (($right - $left) >> 1);
        self::_mergeSort($arr, $left, $mid);
        self::_mergeSort($arr, $mid + 1, $right);
        // 合并
        self::_merge($arr, $left, $mid, $right);
    }

    public static function _merge(&$arr, $left, $mid, $right)
    {
        $help = [];
        $i = 0;
        $p1 = $left;
        $p2 = $mid + 1;
        while ($p1 <= $mid && $p2 <= $right) {
            $help[$i++] = $arr[$p1] < $arr[$p2] ? $arr[$p1++] : $arr[$p2++];
        }
        while ($p1 <= $mid) {
            $help[$i++] = $arr[$p1++];
        }
        while ($p2 <= $right) {
            $help[$i++] = $arr[$p2++];
        }
        for ($i = 0; $i < count($help); $i++) {
            $arr[$left + $i] = $help[$i];
        }

    }

}

