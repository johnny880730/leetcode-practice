<?php
/*
3. 无重复字符的最长子串
给定一个字符串，请你找出其中不含有重复字符的最长子串的长度。

示例1:

输入: "abcabcbb"
输出: 3
解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
示例 2:

输入: "bbbbb"
输出: 1
解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
示例 3:

输入: "pwwkew"
输出: 3
解释: 因为无重复字符的最长子串是"wke"，所以其长度为 3。
    请注意，你的答案必须是 子串 的长度，"pwke"是一个子序列，不是子串。

*/

$s = 'abcabcbb';
$s = '';
$s = 'au';
$s = 'dvdf';
$s = "pwwkew";
$o = new Solution_003();
print_r($o->lengthOfLongestSubstring($s));


class Solution_003
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        if (!$s)
            return 0;

        echo 'string = ' . $s . PHP_EOL;

        /*
         * 维护一个滑动窗口，窗口内的都是没有重复的字符，去尽可能的扩大窗口的大小，窗口不停的向右滑动。
         * 1、如果当前遍历到的字符从未出现过，那么直接扩大右边界；
         * 2、如果当前遍历到的字符出现过，则缩小窗口（左边索引向右移动），然后继续观察当前遍历到的字符；
         * 3、重复上面两步，直到左边索引无法再移动；
         * 4、维护一个结果 $max，每次用出现过的窗口大小来更新结果 $max，最后返回 $max 获取结果。
         */
        $left = $right = 0;
        $len  = strlen($s);
        $max  = 0;
        $arr  = [];      //存放无重复字符的字符串的数据
        while ($right <= $len - 1) {
            if (!in_array($s[$right], $arr)) {
                // 不是重复的字符的话，放入数组，更新max值
                $arr[] = $s[$right];
                $max   = max($max, count($arr));
            } else {
                // 是重复的字符，清空数组，左边界右移一位，右边界和重置到和新的左边界一样
                $max = max($max, count($arr));
                $arr = [];
                $left++;
                $right = $left;
                continue;
            }
            $right++;
        }
        return $max;
    }

}
