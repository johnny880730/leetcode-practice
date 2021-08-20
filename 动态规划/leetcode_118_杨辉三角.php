<?php
/*
118. 杨辉三角
给定一个非负整数 numRows，生成「杨辉三角」的前 numRows 行。

在「杨辉三角」中，每个数是它左上方和右上方的数的和。


示例 1:

输入: numRows = 5
输出: [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]
示例 2:

输入: numRows = 1
输出: [[1]]

https://leetcode-cn.com/problems/pascals-triangle/

*/

$numRows = 5;

var_dump((new Solution118())->generate($numRows));

class Solution118
{
    public function generate($numRows)
    {
        $triangle = [
            1 => [1],
            2 => [1, 1],
        ];
        if ($numRows == 1) {
            return array($triangle[1]);
        }
        if ($numRows == 2) {
            return $triangle;
        }
        for ($i = 3; $i <= $numRows; $i++) {
            $triangle[$i] = $this->initRow($i);
            for ($j = 1; $j <= $numRows - 1; $j++) {
                $triangle[$i][$j] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
            }
        }
        return $triangle;
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
