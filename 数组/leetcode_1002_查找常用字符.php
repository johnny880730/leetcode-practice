<?php
/*
1002. 查找常用字符
给定仅有小写字母组成的字符串数组 A，返回列表中的每个字符串中都显示的全部字符（包括重复字符）组成的列表。例如，如果一个字符在每个字符串中出现 3 次，但不是 4 次，则需要在最终答案中包含该字符 3 次。

你可以按任意顺序返回答案。

示例 1：
输入：["bella","label","roller"]
输出：["e","l","l"]

示例 2：
输入：["cool","lock","cook"]
输出：["c","o"]


提示：
1 <= A.length <= 100
1 <= A[i].length <= 100
A[i][j] 是小写字母

https://leetcode-cn.com/problems/find-common-characters/

*/

$arr = ["bella","label","roller"];
print_r((new Solution977())->commonChars($arr));

class Solution977
{
    function commonChars($words)
    {
        $minFreq = array_fill(0, 26, 999);
        foreach ($words as $word) {
            $temp = array_fill(0, 26, 0);
            $len = strlen($word);
            for ($i = 0; $i < $len; $i++) {
                $temp[ord($word[$i]) - ord('a')]++;
            }
            for ($i = 0; $i < 26; $i++) {
                $minFreq[$i] = min($minFreq[$i], $temp[$i]);
            }
        }
        $res = [];
        for ($i = 0; $i < 26; $i++) {
            if ($minFreq[$i]) {
                for ($j = 0; $j < $minFreq[$i]; $j++) {
                    $res[] = chr($i + 97);
                }
            }
        }
        return $res;
    }
}
