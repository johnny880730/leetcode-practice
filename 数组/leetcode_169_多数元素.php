<?php
/*
169. 多数元素
给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数大于⌊ n/2 ⌋的元素。

你可以假设数组是非空的，并且给定的数组总是存在多数元素。



示例1:

输入: [3,2,3]
输出: 3
示例2:

输入: [2,2,1,1,1,2,2]
输出: 2

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/majority-element
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

var_dump((new Solution169())->majorityElement([2, 2, 2, 1, 1, 1, 2, 2]));
var_dump((new Solution169())->majorityElement2([2, 2, 2, 1, 1, 1, 2, 2]));
var_dump((new Solution169())->majorityElement3([2, 2, 2, 1, 1, 1, 2, 2]));

class Solution169
{

    /**
     * 取排序后的数组中间元素即可
     */
    function majorityElement($nums)
    {
        sort($nums);
        return $nums[floor(count($nums) / 2)];
    }

    /**
     * 统计每个元素出现的次数，找出出现次数最多的
     */
    function majorityElement2($nums)
    {
        // 内置函数
        $count = array_count_values($nums);
        return array_search(max($count), $count);
    }

    /**
     * 同解法二，使用一个hashTable存储遍历的元素
     */
    function majorityElement3($nums)
    {
        // hash table
        $hash = [];
        foreach ($nums as $num) {
            if (!isset($hash[$num])) $hash[$num] = 0;
            $hash[$num]++;
        }
        return array_search(max($hash), $hash);
    }

}
