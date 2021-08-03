<?php
/*
506. 相对名次
给出 N 名运动员的成绩，找出他们的相对名次并授予前三名对应的奖牌。前三名运动员将会被分别授予 “金牌”，“银牌” 和“ 铜牌”（"Gold Medal", "Silver Medal", "Bronze Medal"）。

(注：分数越高的选手，排名越靠前。)

示例 1:

输入: [5, 4, 3, 2, 1]
输出: ["Gold Medal", "Silver Medal", "Bronze Medal", "4", "5"]
解释: 前三名运动员的成绩为前三高的，因此将会分别被授予 “金牌”，“银牌”和“铜牌” ("Gold Medal", "Silver Medal" and "Bronze Medal").
余下的两名运动员，我们只需要通过他们的成绩计算将其相对名次即可。
提示:

N 是一个正整数并且不会超过 10000。
所有运动员的成绩都不相同。

https://leetcode-cn.com/problems/relative-ranks/

*/

$arr =  [5, 4, 3, 2, 1];
print_r((new Solution506())->findRelativeRanks($arr));

class Solution506
{
    function findRelativeRanks($score)
    {
        $newScore = $score;
        rsort($newScore);
        $res = [];
        foreach ($score as $k=>$item) {
            $i = array_search($item, $newScore);
            if ($i == 0) {
                $res[] = 'Gold Medal';
            } else if ($i == 1) {
                $res[] = 'Silver Medal';
            } else if ($i == 2) {
                $res[] = 'Bronze Medal';
            } else {
                $res[] = strval($i + 1);
            }
        }
        return $res;

    }

}
