<?php
/*
14. 最长公共前缀
编写一个函数来查找字符串数组中的最长公共前缀。

如果不存在公共前缀，返回空字符串""。

示例1:

输入: ["flower","flow","flight"]
输出: "fl"
示例2:

输入: ["dog","racecar","car"]
输出: ""
解释: 输入不存在公共前缀。
说明:

所有输入只包含小写字母a-z。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-common-prefix
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

$arr = ["flower", "flow", "flight"];
$o   = new Solution014();
print_r($o->longestCommonPrefix($arr));


class Solution014
{

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        $count       = count($strs);        // 数组总数
        $first       = $strs[0];            // 第一个字符串
        $strlenFirst = strlen($first);      // 第一个字符串长度
        $res         = '';                  // 公共前缀结果
        # 循环第一个字符串
        for ($i = 0; $i < $strlenFirst; $i++) {
            $tmp = $first[$i];              // 字符串第一个字符
            # 遍历数组
            for ($j = 1; $j < $count; $j++) {
                # 判断字符串字符是否相等,不相等则直接返回,相等则在循环外拼接公共前缀
                if ($strs[$j][$i] != $tmp) {
                    return $res;
                }
            }
            $res .= $tmp;
        }
        return $res;
    }
}
