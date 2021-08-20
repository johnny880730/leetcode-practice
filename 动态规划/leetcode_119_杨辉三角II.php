<?php
/*
119. 杨辉三角 II
给定一个非负索引 rowIndex，返回「杨辉三角」的第 rowIndex 行。

在「杨辉三角」中，每个数是它左上方和右上方的数的和。

示例 1:

输入: rowIndex = 3
输出: [1,3,3,1]
示例 2:

输入: rowIndex = 0
输出: [1]
示例 3:

输入: rowIndex = 1
输出: [1,1]

https://leetcode-cn.com/problems/pascals-triangle-ii/

*/

$rowIndex = 3;

var_dump((new Solution119())->getRow($rowIndex));

class Solution119
{
    public function getRow($rowIndex)
    {
        $triangle = [
            0 => [1],
            1 => [1, 1],
        ];
        if ($rowIndex <= 1) {
            return $triangle[$rowIndex];
        }
        for ($i = 2; $i <= $rowIndex; $i++) {
            $triangle[$i] = $this->initRow($i + 1);
            for ($j = 1; $j <= $i - 1; $j++) {
                $triangle[$i][$j] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
            }
        }
        return $triangle[$rowIndex];
    }

    public function initRow($n)
    {
        $arr = [1];
        for ($i = 1; $i < $n - 1; $i++) {
            $arr[] = 0;
        }
        $arr[$n - 1] = 1;
        return $arr;
    }


}
