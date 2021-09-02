<?php
/*
796. 旋转字符串
给定两个字符串, A 和 B。

A 的旋转操作就是将 A 最左边的字符移动到最右边。 例如, 若 A = 'abcde'，在移动一次之后结果就是'bcdea' 。如果在若干次旋转操作之后，A 能变成B，那么返回True。

示例 1:
输入: A = 'abcde', B = 'cdeab'
输出: true

示例 2:
输入: A = 'abcde', B = 'abced'
输出: false

注意：
A 和 B 长度不超过 100。

https://leetcode-cn.com/problems/rotate-string/

*/

$A = 'abcde'; $B = 'cdeab';
$A = 'aa'; $B = 'a';
var_dump((new Solution796())->rotateString($A, $B));

class Solution796
{
    /**
     * A + A 包含了所有可以通过旋转操作从 A 得到的字符串。
     * 需要判断 B 是否和 A 长度相同。
     * 需要判断 B 是否为 A + A 的子串即可。
     */
    function rotateString($s, $goal)
    {
        if (strlen($s) > strlen($goal)) {
            return false;
        }
        return strpos($s . $s, $goal) !== false;
    }



}
