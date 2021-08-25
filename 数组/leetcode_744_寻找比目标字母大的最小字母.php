<?php
/*
744. 寻找比目标字母大的最小字母
给你一个排序后的字符列表 letters ，列表中只包含小写英文字母。另给出一个目标字母 target，请你寻找在这一有序列表里比目标字母大的最小字母。

在比较时，字母是依序循环出现的。举个例子：

如果目标字母 target = 'z' 并且字符列表为 letters = ['a', 'b']，则答案返回 'a'


示例：

输入:
letters = ["c", "f", "j"]
target = "a"
输出: "c"

输入:
letters = ["c", "f", "j"]
target = "c"
输出: "f"

输入:
letters = ["c", "f", "j"]
target = "d"
输出: "f"

输入:
letters = ["c", "f", "j"]
target = "g"
输出: "j"

输入:
letters = ["c", "f", "j"]
target = "j"
输出: "c"

输入:
letters = ["c", "f", "j"]
target = "k"
输出: "c"

https://leetcode-cn.com/problems/find-smallest-letter-greater-than-target/

*/

$letters = ["c", "f", "j"];
$target = "g";
print_r((new Solution744())->nextGreatestLetter($letters, $target));

class Solution744
{
    function nextGreatestLetter($letters, $target)
    {
        $min = '';
        foreach ($letters as $c) {
            if ($c > $target) {
                if (!$min) {
                    $min = $c;
                } else if ($c < $min) {
                    $min = $c;
                }
            }
        }
        if (!$min) {
            $min = $letters[0];
        }
        return $min;

    }

}
