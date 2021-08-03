<?php
/*
15. 三数之和
给定一个包含 n 个整数的数组nums，判断nums中是否存在三个元素 a，b，c ，使得a + b + c = 0 ？找出所有满足条件且不重复的三元组。

注意：答案中不可以包含重复的三元组。

例如, 给定数组 nums = [-1, 0, 1, 2, -1, -4]，

满足要求的三元组集合为：
[
  [-1, 0, 1],
  [-1, -1, 2]
]
在真实的面试中遇到过这道题？

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/3sum
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

$arr = [-1, 0, 1, 2, -1, -4];
$o = new Solution015();
print_r($o->threeSum3($arr));


class Solution015 {

    /*
     * 先给数组排序，取第一个元素，剩下的元素从两边往中间夹
     * 若小于0，说明偏小，则左指针往右移
     * 若大于0，说明偏大，则右指针往左移
     */
    function threeSum3($nums)
    {
        sort($nums);
        $res = [];
        $len = count($nums);
        for ($k = 0; $k < $len - 2; $k++) {
            if ($nums[$k] > 0) {
                // j > i > k
                break;
            }
            if ($k > 0 && $nums[$k] == $nums[$k - 1]) {
                continue;
            }
            $i = $k + 1;
            $j = $len - 1;
            while ($i < $j) {
                $sum = $nums[$k] + $nums[$i] + $nums[$j];
                if ($sum < 0) {
                    $i++;
                    while ($i < $j && $nums[$i] == $nums[$i - 1]) {
                        $i++;
                    }
                } else if ($sum > 0) {
                    $j--;
                    while ($i < $j && $nums[$j] == $nums[$j + 1]) {
                        $j--;
                    }
                } else {
                    $res[] = [$nums[$k], $nums[$i], $nums[$j]];
                    $i++;
                    $j--;
                    while ($i < $j && $nums[$i] == $nums[$i - 1]) {
                        $i++;
                    }
                    while ($i < $j && $nums[$j] == $nums[$j + 1]) {
                        $j--;
                    }
                }
            }
        }
        return $res;

    }

}
