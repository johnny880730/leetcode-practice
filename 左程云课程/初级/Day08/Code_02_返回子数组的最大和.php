<?php
/*
 * 给定一个数组arr，返回所有子数组的累加和中，最大的累加和
 */

$obj = new Code_02_SubArrMaxSum();
echo $obj->getMaxSubSum([3,-2,-2,4,-1,5]) . PHP_EOL;
echo $obj->getMaxSubSum([ -2, -3, -5, 40, -10, -10, 100, 1 ]) . PHP_EOL;

class Code_02_SubArrMaxSum
{
    public function getMaxSubSum($arr)
    {
        if (count($arr) == 0) {
            return 0;
        }
        $max = PHP_INT_MIN;
        $cur = 0;
        for ($i = 0, $len = count($arr); $i < $len; $i++) {
            $cur += $arr[$i];
            $max = max($max, $cur);
            $cur = $cur > 0 ? $cur : 0;
        }
        return $max;
    }

}