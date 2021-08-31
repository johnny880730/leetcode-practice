<?php
/*
205. 同构字符串
给定两个字符串 s 和 t，判断它们是否是同构的。

如果 s 中的字符可以按某种映射关系替换得到 t ，那么这两个字符串是同构的。

每个出现的字符都应当映射到另一个字符，同时不改变字符的顺序。不同字符不能映射到同一个字符上，相同字符只能映射到同一个字符上，字符可以映射到自己本身。

示例 1:
输入：s = "egg", t = "add"
输出：true

示例 2：
输入：s = "foo", t = "bar"
输出：false

示例 3：
输入：s = "paper", t = "title"
输出：true


提示：
可以假设 s 和 t 长度相同。

https://leetcode-cn.com/problems/isomorphic-strings/

*/

$s = 'badc'; $t = 'baba';
$s = "paper"; $t = "title";
var_dump((new Solution205())->isIsomorphic($s, $t));

class Solution205
{
    // 需要双向验证
    function isIsomorphic($s, $t)
    {
        return $this->_isIsomorphic($s, $t) && $this->_isIsomorphic($t, $s);
    }

    function _isIsomorphic($s, $t)
    {
        $hash = [];
        $i = 0;
        $len = strlen($s);
        while ($i < $len) {
            $a = $s[$i];
            $b = $t[$i];
            if (!isset($hash[$a])) {
                $hash[$a] = $b;
            } else {
                if ($hash[$a] != $b) {
                    return false;
                }
            }
            $i++;
        }
        return true;
    }


}
