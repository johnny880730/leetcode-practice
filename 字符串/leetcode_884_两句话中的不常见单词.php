<?php
/*
884. 两句话中的不常见单词
给定两个句子 A 和 B 。 （句子是一串由空格分隔的单词。每个单词仅由小写字母组成。）

如果一个单词在其中一个句子中只出现一次，在另一个句子中却没有出现，那么这个单词就是不常见的。

返回所有不常用单词的列表。

您可以按任何顺序返回列表。

示例 1：
输入：A = "this apple is sweet", B = "this apple is sour"
输出：["sweet","sour"]

示例 2：
输入：A = "apple apple", B = "banana"
输出：["banana"]

https://leetcode-cn.com/problems/uncommon-words-from-two-sentences/

*/

$A = "this apple is sweet"; $B = "this apple is sour";
$res = (new Solution884())->uncommonFromSentences($A, $B);
var_dump($res);

class Solution884
{
    // 两个字符串合并成一个后计数
    function uncommonFromSentences($s1, $s2)
    {
        $res = [];
        $s = $s1 . ' ' . $s2;
        $arr = array_count_values(explode(' ', $s));
        foreach ($arr as $word => $num) {
            if ($num == 1) {
                $res[] = $word;
            }
        }
        return $res;
    }



}
