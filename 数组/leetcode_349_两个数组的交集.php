<?php
/*
349. 两个数组的交集

给定两个数组，编写一个函数来计算它们的交集。

示例 1:

输入: nums1 = [1,2,2,1], nums2 = [2,2]
输出: [2]
示例 2:

输入: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
输出: [9,4]
说明:

输出结果中的每个元素一定是唯一的。
我们可以不考虑输出结果的顺序。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/intersection-of-two-arrays
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

$nums1 = [1, 2, 2, 1];
$nums2 = [2, 2];
$o     = new Solution349();
print_r($o->intersection($nums1, $nums2));

class Solution349
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2)
    {
        $return = [];
        for ($i = 0; $i < count($nums1); $i++) {
            if (in_array($nums1[$i], $return))
                continue;

            if (in_array($nums1[$i], $nums2))
                $return[] = $nums1[$i];
        }
        return $return;
    }
}
