<?php
/*
917. 仅仅反转字母
给定一个字符串 S，返回 “反转后的” 字符串，其中不是字母的字符都保留在原地，而所有字母的位置发生反转。



示例 1：
输入："ab-cd"
输出："dc-ba"

示例 2：
输入："a-bC-dEf-ghIj"
输出："j-Ih-gfE-dCba"

示例 3：
输入："Test1ng-Leet=code-Q!"
输出："Qedo1ct-eeLg=ntse-T!"


提示：

S.length <= 100
33 <= S[i].ASCIIcode <= 122
S 中不包含 \ or "

https://leetcode-cn.com/problems/reverse-only-letters/

*/

$s   = 'Test1ng-Leet=code-Q!';
$s   = 'a-bC-dEf-ghIj';
$s   = "7_28]";
$s   = "?6C40E";
$res = (new Solution917())->reverseOnlyLetters($s);
var_dump($res);

class Solution917
{
    function reverseOnlyLetters($s)
    {
        $i = 0;
        $j = strlen($s) - 1;
        while ($i < $j) {
            echo "i = $i, j = $j" . PHP_EOL;
            while (!ctype_alpha($s[$i]) && $i < $j) {
                $i++;
            }
            while (!ctype_alpha($s[$j]) && $j >= 0) {
                $j--;
            }
            if (ctype_alpha($s[$i]) && ctype_alpha($s[$j])) {
                $tmp = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $tmp;
            }

            $i++;
            $j--;
            echo $s . PHP_EOL;
        }
        return $s;
    }


}
