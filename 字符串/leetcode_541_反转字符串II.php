<?php
/*
541. 反转字符串 II
给定一个字符串 s 和一个整数 k，从字符串开头算起，每 2k 个字符反转前 k 个字符。

如果剩余字符少于 k 个，则将剩余字符全部反转。
如果剩余字符小于 2k 但大于或等于 k 个，则反转前 k 个字符，其余字符保持原样。


示例 1：
输入：s = "abcdefg", k = 2
输出："bacdfeg"

示例 2：
输入：s = "abcd", k = 2
输出："bacd"


提示：
1 <= s.length <= 104
s 仅由小写英文组成
1 <= k <= 104

https://leetcode-cn.com/problems/reverse-string-ii/

*/

$s = "abcdefg"; $k = 2;
$s = "abcd"; $k = 2;
var_dump((new Solution541())->reverseStr($s, $k));

class Solution541
{
    function reverseStr($s, $k)
    {
        $arr = [];
        $str = '';
        for ($i = 0, $len = strlen($s); $i < $len; $i++) {
            $str .= $s[$i];
            if (($i + 1) % (2 * $k) == 0) {
                $arr[] = $str;
                $str   = '';
            }
        }
        if (!empty($str)) {
            $arr[] = $str;
        }
        $count = count($arr);
        foreach ($arr as $key => &$item) {
            if ($key == $count - 1) {
                // 剩余字符的情况
                if (strlen($item) < $k) {
                    // 剩余字符少于k个，直接翻转
                    $item = strrev($item);
                } else {
                    // k <= 剩余字符 < 2k
                    for ($i = 0, $j = $k - 1; $i < $j; $i++, $j--) {
                        $tmp      = $item[$i];
                        $item[$i] = $item[$j];
                        $item[$j] = $tmp;
                    }
                }

            } else {
                // 2k个字符的情况
                for ($i = 0, $j = $k - 1; $i < $j; $i++, $j--) {
                    $tmp      = $item[$i];
                    $item[$i] = $item[$j];
                    $item[$j] = $tmp;
                }
            }
        }
        return join('', $arr);
    }



}
