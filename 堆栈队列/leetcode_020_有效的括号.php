<?php
/**
 * 20. 有效的括号
 * 给定一个只包括 '('，')'，'{'，'}'，'['，']'的字符串，判断字符串是否有效。
 *
 * 有效字符串需满足：
 *
 * 左括号必须用相同类型的右括号闭合。
 * 左括号必须以正确的顺序闭合。
 * 注意空字符串可被认为是有效字符串。
 *
 * 示例 1:
 *
 * 输入: "()"
 * 输出: true
 * 示例2:
 *
 * 输入: "()[]{}"
 * 输出: true
 * 示例3:
 *
 * 输入: "(]"
 * 输出: false
 * 示例4:
 *
 * 输入: "([)]"
 * 输出: false
 * 示例5:
 *
 * 输入: "{[]}"
 * 输出: true
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/valid-parentheses
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

$arg1 = '()[]{}';
$o    = new Solution020();
var_dump($o->isValid($arg1));


class Solution020
{

    /**
     * 数组模拟栈
     * 依次存字符串，若为左侧部分则正常进入
     * 若为右侧部分则从栈取出一个判断是否为一对
     *
     * @param String $s
     * @return String
     */
    function isValid($s)
    {
        if (empty($s))
            return true;

        $len     = strlen($s);
        $myStack = [];
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i] == '(' || $s[$i] == '[' || $s[$i] == '{') {
                $myStack[] = $s[$i];
            } else {
                $tmp = array_pop($myStack);
                if ($tmp !== '[' && $s[$i] == ']')
                    return false;
                if ($tmp !== '{' && $s[$i] == '}')
                    return false;
                if ($tmp !== '(' && $s[$i] == ')')
                    return false;
            }
        }
        return empty($myStack);
    }
}
