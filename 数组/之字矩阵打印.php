<?php
/*
 * 给定一个矩阵matrix，按照“之”字顺序打印
 * 1  2  3  4
 * 5  6  7  8
 * 9  10 11 12
 * 打印结果为：1 2 5 9 6 3 4 7 10 11 8 12
 *
 * 要求：空间复杂度 O(1)
 */
$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
];
matrixPrint($matrix);

function matrixPrint($matrix)
{
    /*
     * 思路：双指针
     * 第一个指针从左上角开始，先往右走，走到底了往下走，直到右下角结束
     * 另一个指针从左上角开始，先往下走，走到底了往右走，直到右下角结束
     * 通过一个变量控制打印的方向，打印两个指针的对角线即可
     */
    $i1 = $j1 = 0;
    $i2 = $j2 = 0;
    $endR = count($matrix) - 1;
    $endC = count($matrix[0]) - 1;
    $fromUp = false;
    while ($i1 != $endR + 1) {
        // 打印对角线
        _printLevel($matrix, $i1, $j1, $i2, $j2, $fromUp);
        // 第一个指针先右后下
        $i1 = $j1 == $endC ? $i1 + 1 : $i1;
        $j1 = $j1 == $endC ? $j1 : $j1 + 1;
        // 第二个指针先下后右
        $j2 = $i2 == $endR ? $j2 + 1 : $j2;
        $i2 = $i2 == $endR ? $i2 : $i2 + 1;
        // 方向取反
        $fromUp = !$fromUp;
    }

}
function _printLevel($matrix, $row1, $col1, $row2, $col2, $fromUp)
{
    if ($fromUp) {
        while ($row1 <= $row2) {
            echo $matrix[$row1++][$col1--] . ' ';
        }
    } else {
        while ($row2 != $row1 - 1) {
            echo $matrix[$row2--][$col2++] . ' ';
        }
    }
}
