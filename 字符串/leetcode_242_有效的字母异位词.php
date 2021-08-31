<?php
/*
242. 有效的字母异位词
给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。

注意：若 s 和 t 中每个字符出现的次数都相同，则称 s 和 t 互为字母异位词。

示例 1:
输入: s = "anagram", t = "nagaram"
输出: true

示例 2:
输入: s = "rat", t = "car"
输出: false


提示:
1 <= s.length, t.length <= 5 * 104
s 和 t 仅包含小写字母

https://leetcode-cn.com/problems/valid-anagram/

*/

$s = 'anagram'; $t = 'nagaram';
$s = "rat"; $t = "car";
var_dump((new Solution242())->isAnagram($s, $t));

class Solution242
{
    // 哈希
    function isAnagram($s, $t)
    {
        $len1 = strlen($s);
        $len2 = strlen($t);
        if ($len1 != $len2) {
            return false;
        }
        $hash1 = $hash2 = [];
        for ($i = 0; $i < $len1; $i++) {
            if (!isset($hash1[$s[$i]])) {
                $hash1[$s[$i]] = 1;
            } else {
                $hash1[$s[$i]]++;
            }
            if (!isset($hash2[$t[$i]])) {
                $hash2[$t[$i]] = 1;
            } else {
                $hash2[$t[$i]]++;
            }
        }
        foreach ($hash1 as $c => $n) {
            if (!isset($hash2[$c]) || $hash2[$c] != $n) {
                return false;
            }
        }
        return true;
    }



}
