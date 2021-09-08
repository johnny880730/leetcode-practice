<?php
/*
在数组中找到一个局部最小的位置
【题目】
定义局部最小的概念
1、arr长度为1时，arr[0]是局部最小；
2、arr的长度为N(N>1)时；
    如果arr[0]<arr[1]，那么arr[0]是局部最小；
    如果arr[N-1]<arr[N-2]，那么arr[N-1]是局部最小；
    如果0<i<N-1，既有arr[i-1]>arr[i]<arr[i+1]，那么arr[i]是局部最小。

给定无序数组arr，已知arr中任意两个相邻的数都不相等。
写一个函数，只需返回arr中任意一个局部最小出现的位置即可。
 */


$arr = [6,5,4,5,2,3,8];
echo Code_FindOneLessValueIndex::getIndex($arr) . PHP_EOL;
$arr = [9,8,7,6,5,4,3,4];
echo Code_FindOneLessValueIndex::getIndex($arr) . PHP_EOL;

/*
 * 思路：
 * 1、如果arr[0]是局部最小则返回；
 * 2、如果arr[N - 1]是局部最小则返回；
 * 3、如果上面两种情况都不满足，说明index从0-1是下降局势，而N-2到N-1是上扬趋势，中间像盆地一样肯定有符合局部最小的index。
 *
 * 使用二分法：
 * A、找到数组中间的数字mid，如果符合arr[mid-1] > arr[mid] < arr[mid + 1]则返回mid;
 * B、如果arr[mid] > arr[mid-1]，表示mid-1到mid是上扬趋势，在mid的两边都是盆地的趋势，都存在局部最小，走哪边都行。继续二分，直到找到为止
 *
 * 可见“二分”不一定必须在有序数组才能用。只要确定在某种标准下，有一边肯定有或者肯定没有就能二分。
 */
class Code_FindOneLessValueIndex
{

    public static function getIndex($arr)
    {
        $len = count($arr);
        if ($len == 0) {
            return -1;
        }
        if ($len == 1 || $arr[0] < $arr[1]) {
            return 0;
        }
        if ($arr[$len - 1] < $arr[$len - 2]) {
            return $len - 1;
        }
        // 二分
        $left = 1;
        $right = $len - 2;
        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($arr[$mid] > $arr[$mid - 1]) {
                $right = $mid - 1;
            } else if ($arr[$mid] > $arr[$mid + 1]) {
                $left = $mid + 1;
            } else {
                return $mid;
            }
        }
        return $left;
    }
}