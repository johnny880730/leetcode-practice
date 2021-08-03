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
$rowIndex = 4;
$res = (new Solution119())->getRow($rowIndex);
print_r($res);

class Solution119
{
    function getRow($rowIndex)
    {

        $arr = [[1], [1,1]];
        if ($rowIndex <= 1) {
            return $arr[$rowIndex];
        }
        for ($row = 2; $row <= $rowIndex; $row++) {
            $arr[$row] = $this->initRow($row+1);
            for ($idx = 1; $idx < $row; $idx++) {
                $left = $idx - 1;
                $right = $left + 1;
                $arr[$row][$idx] = $arr[$row-1][$left] + $arr[$row-1][$right];
            }
        }
        return $arr[$rowIndex];


    }

    function initRow($rowNum) {
        $row = [];
        for ($i = 0; $i < $rowNum; $i++) {
            if ($i == 0 || $i == $rowNum - 1) {
                $row[$i] = 1;
            } else {
                $row[$i] = 0;
            }
        }
        return $row;
    }


}
