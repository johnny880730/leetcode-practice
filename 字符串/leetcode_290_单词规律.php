<?php
/*
290. 单词规律
给定一种规律 pattern 和一个字符串 str ，判断 str 是否遵循相同的规律。

这里的 遵循 指完全匹配，例如， pattern 里的每个字母和字符串 str 中的每个非空单词之间存在着双向连接的对应规律。

示例1:
输入: pattern = "abba", str = "dog cat cat dog"
输出: true

示例 2:
输入:pattern = "abba", str = "dog cat cat fish"
输出: false

示例 3:
输入: pattern = "aaaa", str = "dog cat cat dog"
输出: false

示例 4:
输入: pattern = "abba", str = "dog dog dog dog"
输出: false

你可以假设 pattern 只包含小写字母， str 包含了由单个空格分隔的小写字母。

https://leetcode-cn.com/problems/word-pattern/

*/

$pattern = "abba"; $str = "dog cat cat dog";
$pattern = "abba"; $str = "dog cat cat fish";
$pattern = "abba"; $str = "dog dog dog dog";
var_dump((new Solution290())->wordPattern($pattern, $str));

class Solution290
{
    // 哈希
    function wordPattern($pattern, $s)
    {
        $s = explode(' ', $s);
        $len = strlen($pattern);
        $len1 = count($s);
        if ($len != $len1) {
            return false;
        }
        $hash = [];
        for($i = 0; $i < $len; $i++) {
            if (isset($hash[$pattern[$i]]) && $hash[$pattern[$i]] != $s[$i] ) {
                return false;
            } else {
                $hash[$pattern[$i]] = $s[$i];
            }
        }
        $hashUnique = array_unique(array_values($hash));
        if (count($hash) != count($hashUnique)) {
            return false;
        }
        return true;
    }



}
