<?php
/*
387. 字符串中的第一个唯一字符
给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。

示例：
s = "leetcode"
返回 0

s = "loveleetcode"
返回 2

提示：你可以假定该字符串只包含小写字母。

https://leetcode-cn.com/problems/first-unique-character-in-a-string/

*/

$s = "leetcode";
$s = "loveleetcode";
var_dump((new Solution387())->firstUniqChar($s));

class Solution387
{
    // 哈希
    function firstUniqChar($s)
    {
        $hash = array_count_values(str_split($s));
        for ($i = 0; $i < strlen($s); $i++) {
            if ($hash[$s[$i]] == 1) {
                return $i;
            }
        }
        return -1;

    }



}
