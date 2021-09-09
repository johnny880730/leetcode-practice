<?php
/*
 * 在行列都排好序的矩阵中找数
 * 【题目】给定一个有N*M的整型矩阵matrix和一个整数K，
 *  matrix的每一行和每一列都是排好序的。
 * 实现一个函数，判断K是否在matrix中。例如：
 * 0 1 2 5
 * 2 3 4 7
 * 4 4 4 8
 * 5 7 7 9
 * 如果K为7，返回true；如果K为6，返回false。
 *
 * 【要求】时间复杂度为O(N+M)，额外空间复杂度为O(1)。
 */
$matrix = [
    [0,1,2,5],
    [2,3,4,7],
    [4,4,4,8],
    [5,7,7,9],
];
$k = 3;
$res = findInSortMatrix($matrix, $k);
var_dump($res);

function findInSortMatrix($matrix, $k)
{
    // 利用矩阵特性，从右上角开始找.
    // 如果右上角比k大，往左找，比k小，往下找
    $row = 0;
    $col = count($matrix[0]) - 1;
    $len = count($matrix);
    while ($row < $len && $col > -1) {
        if ($matrix[$row][$col] == $k) {
            return true;
        } else if ($matrix[$row][$col] > $k) {
            $col--;
        } else {
            $row++;
        }
    }
    return false;
}
