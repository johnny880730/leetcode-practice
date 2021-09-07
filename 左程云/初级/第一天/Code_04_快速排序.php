<?php
// 快速排序

$arr = [9, 8, 7, 6, 5, 4, 3, 2, 1];
$res = Code_QuickSort::QuickSort($arr);
print_r($res);

class Code_QuickSort
{
    public static function QuickSort($arr)
    {
        if ($arr == null || count($arr) < 2) {
            return $arr;
        }
        self::_quickSort($arr, 0, count($arr) - 1);
        return $arr;
    }

    public static function _quickSort(&$arr, $left, $right)
    {
        if ($left < $right) {
            $partitionIndex = self::_partition($arr, $left, $right);
            self::_quickSort($arr, $left, $partitionIndex-1);
            self::_quickSort($arr, $partitionIndex+1, $right);
        }
    }


    public static function _partition(&$arr, $l, $r) {
		$pivot = $l;
		$index = $pivot + 1;
		for ($i = $index; $i <= $r; $i++) {
		    if ($arr[$i] < $arr[$pivot]) {
		        self::swap($arr, $i, $index);
		        $index++;
            }
        }
		self::swap($arr, $pivot, $index-1);
		return $index-1;
	}

    public static function swap(&$arr, $i, $j)
    {
        $tmp     = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }
}

