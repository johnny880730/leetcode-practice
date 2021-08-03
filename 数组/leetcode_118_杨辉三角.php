<?php
/*
118. 杨辉三角
给定一个非负整数 numRows，生成「杨辉三角」的前 numRows 行。

在「杨辉三角」中，每个数是它左上方和右上方的数的和。



示例 1:

输入: numRows = 5
输出: [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]

https://leetcode-cn.com/problems/pascals-triangle/


*/
$numRows = 5;
$res = (new Solution118())->generate($numRows);
print_r($res);

class Solution118
{
    function generate($numRows)
    {
        $numRows--;

        $arr = [[1], [1,1]];
        if ($numRows == 0) {
            return [$arr[0]];
        }
        if ($numRows == 1) {
            return $arr;
        }
        for ($row = 2; $row <= $numRows; $row++) {
            $arr[$row] = $this->initRow($row+1);
            for ($idx = 1; $idx < $row; $idx++) {
                $left = $idx - 1;
                $right = $left + 1;
                $arr[$row][$idx] = $arr[$row-1][$left] + $arr[$row-1][$right];
            }
        }
        return $arr;


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
