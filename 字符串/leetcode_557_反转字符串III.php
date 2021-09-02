<?php
/*
557. 反转字符串中的单词 III
给定一个字符串，你需要反转字符串中每个单词的字符顺序，同时仍保留空格和单词的初始顺序。

示例：
输入："Let's take LeetCode contest"
输出："s'teL ekat edoCteeL tsetnoc"

提示：
在字符串中，每个单词由单个空格分隔，并且字符串中不会有任何额外的空格。

https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/

*/

$s = "Let's take LeetCode contest";
var_dump((new Solution557())->reverseWords($s));

class Solution557
{
    function reverseWords($s)
    {
        $arr = explode(' ', $s);
        foreach ($arr as &$word) {
            for ($i = 0, $j = strlen($word) - 1; $i < $j; $i++, $j--) {
                $tmp = $word[$i];
                $word[$i] = $word[$j];
                $word[$j] = $tmp;
            }
        }
        return join(' ', $arr);
    }



}
