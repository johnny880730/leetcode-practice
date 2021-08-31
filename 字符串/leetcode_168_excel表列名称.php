<?php
/*
168. Excel表列名称
给你一个整数 columnNumber ，返回它在 Excel 表中相对应的列名称。

例如：
A -> 1
B -> 2
C -> 3
...
Z -> 26
AA -> 27
AB -> 28
...


示例 1：
输入：columnNumber = 1
输出："A"

示例 2：
输入：columnNumber = 28
输出："AB"

示例 3：
输入：columnNumber = 701
输出："ZY"

示例 4：
输入：columnNumber = 2147483647
输出："FXSHRXW"


提示：
1 <= columnNumber <= 231 - 1

https://leetcode-cn.com/problems/excel-sheet-column-title/

*/

$num = 701;
print_r((new Solution168())->convertToTitle($num));

class Solution168
{
    /*
     * 26进制转换
     * 只需要不断地对 columnNumber 进行 % 运算取得最后一位，然后对 columnNumber 进行 / 运算，将已经取得的位数去掉，
     * 直到 columnNumber 为 0 即可
     */
    function convertToTitle($columnNumber)
    {
        if ($columnNumber <= 0) {
            return "";
        }
        $s = "";
        while ($columnNumber > 0) {
            $columnNumber--;
            $s = chr(fmod($columnNumber, 26) + 65) . $s;
            $columnNumber = floor($columnNumber / 26);
        }
        return $s;

    }


}
