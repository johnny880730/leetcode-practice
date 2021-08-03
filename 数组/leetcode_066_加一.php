<?php
/*
66. 加一

给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。

最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。

你可以假设除了整数 0 之外，这个整数不会以零开头。

示例1:

输入: [1,2,3]
输出: [1,2,4]
解释: 输入数组表示数字 123。
示例2:

输入: [4,3,2,1]
输出: [4,3,2,2]
解释: 输入数组表示数字 4321。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/plus-one
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


*/
$s = [4,3,2,1];
$s = [7,2,8,5,0,9,1,2,9,5,3,6,6,7,3,2,8,4,3,7,9,5,7,7,4,7,4,9,4,7,0,1,1,1,7,4,0,0,6];
$s = [9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,8,9];
$o = new Solution066();
print_r($o->plusOne($s));

class Solution066 {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        if (empty($digits)) {
            return [];
        }
        $count = count($digits);
        if ($digits[$count-1] != 9) {
            $digits[$count-1] += 1;
            return $digits;
        }
        if ($digits[0]==9) {
            array_unshift($digits, 0);
            $count = count($digits);
        }

        $r = $count - 1;
        while ($r >= 0) {
            if ($digits[$r] == 9) {
                $digits[$r] = 0;
                $r--;
                continue;
            }
            if ($digits[$r] != 9) {
                $digits[$r] += 1;
                break;
            }
            $r--;
        }
        return $digits;
    }


}
