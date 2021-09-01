<?php
/*
500. 键盘行
给你一个字符串数组 words ，只返回可以使用在 美式键盘 同一行的字母打印出来的单词。键盘如下图所示。

美式键盘 中：

第一行由字符 "qwertyuiop" 组成。
第二行由字符 "asdfghjkl" 组成。
第三行由字符 "zxcvbnm" 组成。
American keyboard

示例 1：
输入：words = ["Hello","Alaska","Dad","Peace"]
输出：["Alaska","Dad"]

示例 2：
输入：words = ["omk"]
输出：[]

示例 3：
输入：words = ["adsdf","sfd"]
输出：["adsdf","sfd"]


提示：
1 <= words.length <= 20
1 <= words[i].length <= 100
words[i] 由英文字母（小写和大写字母）组成

https://leetcode-cn.com/problems/keyboard-row/

*/

$words = ["Hello", "Alaska", "Dad", "Peace"];
var_dump((new Solution500())->findWords($words));

class Solution500
{
    function findWords($words)
    {
        $res = [];
        // 26个字母每个字母在第几行
        $map = [2, 3, 3, 2, 1, 2, 2, 2, 1, 2, 2, 2, 3, 3, 1, 1, 1, 1, 2, 1, 1, 3, 1, 3, 1, 3];
        foreach ($words as $word) {
            $n = 0;
            $flag = true;

            for ($i = 0, $len = strlen($word); $i < $len; $i++) {
                $line = $map[ord( strtolower($word[$i]) ) - ord('a')];
                if ($n == 0) {
                    $n = $line;
                } else if ($n > 0 && $n != $line){
                    $flag = false;
                    break;
                }
            }
            if ($flag) {
                $res[] = $word;
            }
        }
        return $res;
    }


}
