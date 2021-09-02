<?php
/*
680. 验证回文字符串 Ⅱ
给定一个非空字符串 s，最多删除一个字符。判断是否能成为回文字符串。

示例 1:
输入: s = "aba"
输出: true

示例 2:
输入: s = "abca"
输出: true
解释: 你可以删除c字符。

示例 3:
输入: s = "abc"
输出: false


提示:

1 <= s.length <= 105
s 由小写英文字母组成

https://leetcode-cn.com/problems/valid-palindrome-ii/

*/

$s = "aba";
$s = 'abc';
$s = 'abca';
var_dump((new Solution680())->validPalindrome($s));

class Solution680
{
    /*
     * 双指针：两边往中间扫描，遇到不同字符时，判断去掉左字符或去掉右侧字符是否仍为回文
     */
    function validPalindrome($s)
    {
        $i = 0;
        $j = strlen($s) - 1;
        while ($i < $j) {
            if ($s[$i] != $s[$j]) {
                return $this->check($s, $i+1, $j) || $this->check($s, $i, $j-1);
            }
            $i++;
            $j--;
        }
        return true;
    }

    function check($s, $left, $right)
    {
        while ($left < $right) {
            if ($s[$left] != $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }



}
