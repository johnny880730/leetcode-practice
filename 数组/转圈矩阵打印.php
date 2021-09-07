<?php

/*
 * 给定一个矩阵matrix，按照转圈的顺序打印
 * 1  2  3  4
 * 5  6  7  8
 * 9  10 11 12
 * 13 14 15 16
 * 打印结果为：1 2 3 4 8 12 16 15 14 13 9 5 6 7 11 10
 *
 * 要求：空间复杂度 O(1)
 */
$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
    [13, 14, 15, 16],
];
matrixPrint($matrix);

function matrixPrint($matrix)
{
    /*
     * 思路：
     * 取每一圈的左上角和右下角的两个点的坐标确定边界，按顺序打印
     * 一圈跑完后左上角往右下走一格，右下角的点往左上走一格继续跑圈
     */
    $i1 = $j1 = 0;                  //左上角的横纵坐标
    $i2 = count($matrix) - 1;       //右下角的横坐标
    $j2 = count($matrix[0]) - 1;    //右下角的纵坐标
    while ($i1 <= $i2 && $j1 <= $j2) {
        _matrixPrint($matrix, $i1++, $j1++, $i2--, $j2--);
    }

}
function _matrixPrint($matrix, $row1, $col1, $row2, $col2)
{
    if ($row1 == $row2) {
        // 矩阵只有一行的情况
        for ($i = $col1; $i <= $col2; $i++) {
            echo $matrix[$row1][$i] . ' ';
        }

    } else if ($col1 == $col2) {
        // 矩阵只有一列的情况
        for ($i = $row1; $i <= $row2; $i++) {
            echo $matrix[$i][$col1] . ' ';
        }

    } else {
        // 按要求顺序沿着边界打印
        $curRow = $row1;
        $curCol = $col1;
        while ($curCol != $col2) {
            echo $matrix[$curRow][$curCol] . ' ';
            $curCol++;
        }
        while ($curRow != $row2) {
            echo $matrix[$curRow][$curCol] . ' ';
            $curRow++;
        }
        while ($curCol != $col1) {
            echo $matrix[$curRow][$curCol] . ' ';
            $curCol--;
        }
        while ($curRow != $row1) {
            echo $matrix[$curRow][$curCol] . ' ';
            $curRow--;
        }
    }
}
