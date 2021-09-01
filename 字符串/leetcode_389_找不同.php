<?php
/*
389. 找不同
给定两个字符串 s 和 t，它们只包含小写字母。

字符串 t 由字符串 s 随机重排，然后在随机位置添加一个字母。

请找出在 t 中被添加的字母。

示例 1：
输入：s = "abcd", t = "abcde"
输出："e"
解释：'e' 是那个被添加的字母。

示例 2：
输入：s = "", t = "y"
输出："y"

示例 3：
输入：s = "a", t = "aa"
输出："a"

示例 4：
输入：s = "ae", t = "aea"
输出："a"

提示：
0 <= s.length <= 1000
t.length == s.length + 1
s 和 t 只包含小写字母

*/

$s = 'a'; $t = 'aa';
$s = "abcd"; $t = "abcde";
var_dump((new Solution389())->findTheDifference($s, $t));

class Solution389
{
    function findTheDifference($s, $t)
    {
        $arr = array_fill(0, 26, 0);
        $lenS = strlen($s);
        for ($i = 0; $i < $lenS; $i++) {
            $arr[ord($s[$i]) - ord('a')]++;
        }
        $lenT = strlen($t);
        for ($i = 0; $i < $lenT; $i++) {
            $arr[ord($t[$i]) - ord('a')]--;
            if ($arr[ord($t[$i]) - ord('a')] < 0) {
                return $t[$i];
            }
        }
        return '';
    }

    function findTheDifference2($s, $t)
    {
        $arrT = str_split($t);
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if (in_array($s[$i], $arrT)) {
                $idx = array_search($s[$i], $arrT);
                unset($arrT[$idx]);
            }
        }
        return join('', $arrT);
    }



}
