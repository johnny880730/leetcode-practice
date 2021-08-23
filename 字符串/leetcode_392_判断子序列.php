<?php
/*
392. 判断子序列
给定字符串 s 和 t ，判断 s 是否为 t 的子序列。

字符串的一个子序列是原始字符串删除一些（也可以不删除）字符而不改变剩余字符相对位置形成的新字符串。（例如，"ace"是"abcde"的一个子序列，而"aec"不是）。

进阶：

如果有大量输入的 S，称作 S1, S2, ... , Sk 其中 k >= 10亿，你需要依次检查它们是否为 T 的子序列。在这种情况下，你会怎样改变代码？

致谢：

特别感谢 @pbrother 添加此问题并且创建所有测试用例。



示例 1：
输入：s = "abc", t = "ahbgdc"
输出：true

示例 2：
输入：s = "axc", t = "ahbgdc"
输出：false


提示：
0 <= s.length <= 100
0 <= t.length <= 10^4
两个字符串都只由小写字符组成。

https://leetcode-cn.com/problems/is-subsequence/
*/
$s = 'abc';
$t = 'ahbgdc';

var_dump((new Solution392())->isSubsequence($s, $t));


class Solution392
{
    /*
     * 初始化两个指针 i 和 j，分别指向 s 和 t 的初始位置。
     * 每次匹配成功则 i 和 j 同时右移，匹配 s 的下一个位置；
     * 匹配失败则 j 右移，i 不变，尝试用 t 的下一个字符匹配 s。
     * 最终如果 i 移动到 s 的末尾，就说明 s 是 t 的子序列。
     */
    function isSubsequence($s, $t)
    {
        $sLen = strlen($s);
        $tLen = strlen($t);
        $i = $j = 0;
        while($i < $sLen && $j < $tLen) {
            if ($s[$i] == $t[$j]) {
                $i++;
            }
            $j++;
        }
        return $i == $sLen;
    }
}
