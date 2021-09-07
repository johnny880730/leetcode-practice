<?php
// 插入排序
// 时间复杂度O(N^2)，额外空间复杂度O(1)，实现可以做到稳定性

$arr = [9, 8, 7, 6, 5, 4, 3, 2, 1];
$res = Code_HeapSort::HeapSort($arr);
print_r($res);

class Code_HeapSort
{
    public static function HeapSort($arr)
    {
        if ($arr == null || count($arr) < 2) {
            return $arr;
        }
        $len = count($arr);
        // 创建大顶堆
        for ($i = 0; $i < $len; $i++) {
            self::heapInsert($arr, $i);
        }
        self::swap($arr, 0, --$len);
        while ($len > 0) {
            self::heapify($arr, 0, $len);
            self::swap($arr, 0, --$len);
        }

        return $arr;
    }

    /*
     * 利用数组模拟大顶堆堆
     * 如果父节点的key是i: 左孩子的key=2*i+1，右孩子的key=2*i+2;
     * 如果某个子节点的key是i，则父节点的key=intval((i - 1) / 2)
     */ 
    public static function heapInsert($arr, $index)
    {
        $parent = intval(($index - 1) / 2);
        while ($arr[$index] > $arr[$parent]) {
            self::swap($arr, $index, $parent);
            $index = $parent;
        }
    }

    public static function heapify(&$arr, $index, $size) {
		$left = $index * 2 + 1;
		while ($left < $size) {
			$largest = $left + 1 < $size && $arr[$left + 1] > $arr[$left] ? $left + 1 : $left;
            $largest = $arr[$largest] > $arr[$index] ? $largest : $index;
			if ($largest == $index) {
				break;
			}
            self::swap($arr, $largest, $index);
            $index = $largest;
            $left = $index * 2 + 1;
        }
    }

    public static function swap(&$arr, $i, $j)
    {
        $tmp     = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }
}

