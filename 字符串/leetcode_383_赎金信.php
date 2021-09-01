<?php
/*
383. 赎金信
给定一个赎金信 (ransom) 字符串和一个杂志(magazine)字符串，判断第一个字符串 ransom 能不能由第二个字符串 magazines 里面的字符构成。如果可以构成，返回 true ；否则返回 false。

(题目说明：为了不暴露赎金信字迹，要从杂志上搜索各个需要的字母，组成单词来表达意思。杂志字符串中的每个字符只能在赎金信字符串中使用一次。)

示例 1：
输入：ransomNote = "a", magazine = "b"
输出：false

示例 2：
输入：ransomNote = "aa", magazine = "ab"
输出：false

示例 3：
输入：ransomNote = "aa", magazine = "aab"
输出：true


提示：
你可以假设两个字符串均只含有小写字母。

https://leetcode-cn.com/problems/ransom-note/

*/

$ransomNote = "aa"; $magazine = "ab";
var_dump((new Solution383())->canConstruct($ransomNote, $magazine));

class Solution383
{
    function canConstruct($ransomNote, $magazine)
    {
        $len = strlen($ransomNote);
        $aMagazine = str_split($magazine);
        for ($i = 0; $i < $len; $i++) {
            if (!in_array($ransomNote[$i], $aMagazine)) {
                return false;
            }
            $idx = array_search($ransomNote[$i], $aMagazine);
            unset($aMagazine[$idx]);
        }
        return true;
    }



}
