<?php
// 冒泡排序
// 时间复杂度O(N^2)，额外空间复杂度O(1)，实现可以做到稳定性

$arr = [9,8,7,6,5,4,3,2,1];
$res = Code_BubbleSort::bubbleSort($arr);
print_r($res);

class Code_BubbleSort
{
    public static function bubbleSort($arr) {
		if ($arr == null || count($arr) < 2) {
			return $arr;
		}
        for ($e = count($arr) - 1; $e > 0; $e--) {
            for ($i = 0; $i < $e; $i++) {
                if ($arr[$i] > $arr[$i + 1]) {
                    self::swap($arr, $i, $i + 1);
                }
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

