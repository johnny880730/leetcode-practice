<?php
/*
844. 比较含退格的字符串
给定 S 和 T 两个字符串，当它们分别被输入到空白的文本编辑器后，判断二者是否相等，并返回结果。 # 代表退格字符。

注意：如果对空文本输入退格字符，文本继续为空。

示例 1：
输入：S = "ab#c", T = "ad#c"
输出：true
解释：S 和 T 都会变成 “ac”。

示例 2：
输入：S = "ab##", T = "c#d#"
输出：true
解释：S 和 T 都会变成 “”。

示例 3：
输入：S = "a##c", T = "#a#c"
输出：true
解释：S 和 T 都会变成 “c”。

示例 4：
输入：S = "a#c", T = "b"
输出：false
解释：S 会变成 “c”，但 T 仍然是 “b”。


提示：
1 <= S.length <= 200
1 <= T.length <= 200
S 和 T 只含有小写字母以及字符 '#'。

https://leetcode-cn.com/problems/backspace-string-compare/

*/

$S = 'ab##'; $T = 'c#d#';
$S = "ab#c"; $T = "ad#c";
$S = "a#c"; $T = "b";
$S = "y#fo##f"; $T = "y#f#o##f";
$res = (new Solution844())->backspaceCompare($S, $T);
var_dump($res);

class Solution844
{
    // 利用栈
    function backspaceCompare($s, $t)
    {
        $s = $this->stack($s);
        $t = $this->stack($t);
        return $s === $t;
    }

    function stack($str)
    {
        $len = strlen($str);
        $stack = new SplStack();
        for ($i = 0; $i < $len; $i++) {
            if ($str[$i] == '#') {
                if (!$stack->isEmpty()) {
                    $stack->pop();
                }
            } else {
                $stack->push($str[$i]);
            }
        }
        $res = '';
        while (!$stack->isEmpty()) {
            $res .= $stack->pop();
        }
        return $res;
    }


}
