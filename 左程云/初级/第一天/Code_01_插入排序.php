<?php
// 插入排序
// 时间复杂度O(N^2)，额外空间复杂度O(1)，实现可以做到稳定性

$arr = [9,8,7,6,5,4,3,2,1];
$res = Code_InsertionSort::InsertionSort($arr);
print_r($res);

class Code_InsertionSort
{
    public static function InsertionSort($arr) {
        if ($arr == null || count($arr) < 2) {
            return $arr;
        }
        for ($i = 1, $len = count($arr); $i < $len; $i++) {
            for ($j = $i - 1; $j >= 0 && $arr[$j] > $arr[$j + 1]; $j--) {
                self::swap($arr, $j, $j+1);
            }
        }
        return $arr;
	}

    public static function swap(&$arr, $i, $j)
    {
        $arr[$i] = $arr[$i] ^ $arr[$j];
        $arr[$j] = $arr[$i] ^ $arr[$j];
        $arr[$i] = $arr[$i] ^ $arr[$j];
	}
}

