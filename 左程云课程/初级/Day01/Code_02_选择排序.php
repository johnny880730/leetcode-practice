<?php
// 插入排序
// 时间复杂度O(N^2)，额外空间复杂度O(1)，实现可以做到稳定性

$arr = [9, 8, 7, 6, 5, 4, 3, 2, 1];
$res = Code_SelectionSort::SelectionSort($arr);
print_r($res);

class Code_SelectionSort
{
    public static function SelectionSort($arr)
    {
        if ($arr == null || count($arr) < 2) {
            return $arr;
        }
        for ($i = 0, $len = count($arr); $i < $len; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            self::swap($arr, $i, $minIndex);
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

