<?php
/*
171. Excel 表列序号
给你一个字符串 columnTitle ，表示 Excel 表格中的列名称。返回该列名称对应的列序号。
例如，

    A -> 1
    B -> 2
    C -> 3
    ...
    Z -> 26
    AA -> 27
    AB -> 28
    ...


示例 1:
输入: columnTitle = "A"
输出: 1

示例 2:
输入: columnTitle = "AB"
输出: 28

示例 3:
输入: columnTitle = "ZY"
输出: 701

示例 4:
输入: columnTitle = "FXSHRXW"
输出: 2147483647

https://leetcode-cn.com/problems/excel-sheet-column-number/

*/

$num = 'FXSHRXW';
// 23×26^0 + 24×26^1 + 18×26^2 + 8×26^3 + 19×26^4 + 24×26^5 + 6×26^6
print_r((new Solution171())->titleToNumber($num));

class Solution171
{
    /*
     * 26进制转换10进制
     * 参考2进制转10进制的方法
     */
    function titleToNumber($columnTitle)
    {
        $res = 0;
        $len = strlen($columnTitle);
        $pow = 0;
        for ($i = $len - 1; $i >= 0; $i--) {
            $k = ord($columnTitle[$i]) - ord('A') + 1;
            $res += $k * pow(26, $pow);
            $pow++;
        }
        return $res;
    }


}
