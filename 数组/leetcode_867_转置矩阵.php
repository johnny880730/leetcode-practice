<?php
/*
867. 转置矩阵
给你一个二维整数数组 matrix， 返回 matrix 的 转置矩阵 。

矩阵的 转置 是指将矩阵的主对角线翻转，交换矩阵的行索引与列索引。

示例 1：

输入：matrix = [[1,2,3],[4,5,6],[7,8,9]]
1 2 3         1 4 7
4 5 6    =>   2 5 8
7 8 9         3 6 9
输出：[[1,4,7],[2,5,8],[3,6,9]]

示例 2：
输入：matrix = [[1,2,3],[4,5,6]]
1 2 3      1 4
4 5 6  =>  2 5
           3 6
输出：[[1,4],[2,5],[3,6]]

https://leetcode-cn.com/problems/transpose-matrix/

*/

$arr = [[1,2,3],[4,5,6],[7,8,9]];
print_r((new Solution867())->transpose($arr));

class Solution867
{
    /*
     * 如果原矩阵 $matrix有 m行n列，则转置后的矩阵$newMatrix为 n行m列
     * 且 $newMatrix[$j][$i] = $matrix[$i][$j]
     */
    function transpose($matrix)
    {
        $newMatrix = [];
        $m = count($matrix);
        $n = count($matrix[0]);
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $newMatrix[$j][$i] = $matrix[$i][$j];
            }
        }
        return $newMatrix;
    }
}
