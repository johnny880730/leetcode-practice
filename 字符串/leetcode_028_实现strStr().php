<?php
/*
28. 实现 strStr()
实现strStr()函数。

给定一个haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。如果不存在，则返回 -1。

示例 1:

输入: haystack = "hello", needle = "ll"
输出: 2
示例 2:

输入: haystack = "aaaaa", needle = "bba"
输出: -1
说明:

当needle是空字符串时，我们应当返回什么值呢？这是一个在面试中很好的问题。

对于本题而言，当needle是空字符串时我们应当返回 0 。这与C语言的strstr()以及 Java的indexOf()定义相符。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/implement-strstr
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

$arg1 = 'hello';
$arg2 = 'll';
$o    = new Solution028();
var_dump($o->strStr($arg1, $arg2));


class Solution028
{

    function strStr($haystack, $needle)
    {
        if (empty($needle))
            return 0;

        if (substr_count($haystack, $needle) > 0) {
            return strpos($haystack, $needle);
        } else {
            return -1;
        }

    }
}
