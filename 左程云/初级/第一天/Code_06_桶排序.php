<?php
// 桶排序和基数排序
// 时间复杂度O(N)，额外空间复杂度O(N)，实现做到稳定性
// 注意：
// 1，桶排序的扩展，排序后的最大相邻数差值问题
// 2，非基于比较的排序，对数据的位数和范围有限制。

$arr = [9, 8, 7, 6, 5, 4, 3, 2, 1];
$res = Code_BucketSort::BucketSort($arr);
print_r($res);

class Code_BucketSort
{
    public static function BucketSort($arr)
    {
        if ($arr == null || count($arr) < 2) {
            return $arr;
        }
        $max = max($arr);
        $bucket = array_fill(0, $max+1, 0);
        for ($i = 0, $len = count($arr); $i < $len; $i++) {
            $bucket[$arr[$i]]++;
        }
        $i = 0;
        for ($j = 0; $j < count($bucket); $j++) {
            while ($bucket[$j]-- > 0) {
                $arr[$i++] = $j;
            }
        }
        return $arr;
    }

    public static function swap(&$arr, $i, $j)
    {
        $tmp     = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }
}

