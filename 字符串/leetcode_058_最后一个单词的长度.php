<?php
/*
58. 最后一个单词的长度
给定一个仅包含大小写字母和空格' '的字符串，返回其最后一个单词的长度。

如果不存在最后一个单词，请返回 0。

说明：一个单词是指由字母组成，但不包含任何空格的字符串。

示例:

输入: "Hello World"
输出: 5

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/length-of-last-word
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

$arg1 = 'Hello Worldd';
$arg1 = 'b  a  ';
$o    = new Solution058();
var_dump($o->lengthOfLastWord($arg1));


class Solution058
{

    function lengthOfLastWord($s)
    {
        $return = 0;
        $len    = strlen($s);
        // 倒序循环：字符为空格且有字母就return
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($s[$i] != ' ') {
                $return++;
            }
            if ($s[$i] == ' ' && $return > 0) {
                break;
            }
        }
        return $return;
    }
}
