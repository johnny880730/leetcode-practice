<?php
/*
67. 二进制求和
给定两个二进制字符串，返回他们的和（用二进制表示）。

输入为非空字符串且只包含数字1和0。

示例1:

输入: a = "11", b = "1"
输出: "100"
示例2:

输入: a = "1010", b = "1011"
输出: "10101"

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/add-binary
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
$a = '11';
$b = '1';

$a = '1';
$b = '111';
$o = new Solution();
print_r($o->addBinary($a, $b));



class Solution {

    /**
     * 同位相加，看是否有进位，再进行相应处理
     *
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $aLen = strlen($a);
        $bLen = strlen($b);
        # Step 1:计算出每个字符串的长度后，进行比较，以0来填充字符串确保两个字符串位数相同
        if ($aLen != $bLen) {
            if ($aLen < $bLen) {
                $a = str_pad($a, $bLen, '0', STR_PAD_LEFT);
            } else if ($aLen > $bLen) {
                $b = str_pad($b, $aLen, '0', STR_PAD_LEFT);
            }
        }
        $aLen = $bLen = strlen($a);
        echo "a = $a; b = $b".PHP_EOL;
        # Step 2: 经Step 1后，两字符串位数已经相同，$aLen-1后的下标即为最后一位数的下标，即从末位开始进行相加
        for ($i = $aLen - 1; $i >= 0; $i--) {
            echo "i = $i, code_a = $a[$i], code_b = $b[$i]".PHP_EOL;
            $a[$i] = $a[$i] + $b[$i];
            if ($i != 0) {
                //当下标没有到第一个字符的时候，判断相加之和是否大于1，大于1则需要进位
                if ($a[$i] > 1) {
                    //把相加之和取模2后的值赋值给当前下标对应值
                    $a[$i] = $a[$i] % 2;
                    //顺便把前一个下标对应值先加一个进位，这样在下一轮循环的时候，该值已为最新值了
                    $a[$i - 1] = $a[$i - 1] + 1;
                }
            } else {
                //由于下标0比较特殊，可能两数相加后，会产生一个位数大1的数，则需要再连接一个字符1在字符串前，最后才是正确结果。
                if ($a[$i] > 1) {
                    $a[$i] = $a[$i] % 2;
                    $a = '1' . $a;
                }
            }
        }
        return $a;
    }


    function addBinary2($a, $b) {
        $len1 = strlen($a);
        $len2 = strlen($b);
        if ($len1 == 0) return $b;
        if ($len2 == 0) return $a;

        $return = '';
        $carry = 0;
        $i = $len1 - 1;
        $j = $len2 - 1;
        while ($i >= 0 || $j >= 0 || $carry) {
            $sum = $carry;
            if ($i >= 0) {
                $sum += substr($a, $i, 1);
                $i--;
            }

            if ($j >= 0) {
                $sum += substr($b, $j, 1);
                $j--;
            }

            // 进位处理，大于 2 就进一位
            $carry = $sum >= 2 ? 1 : 0;
            // 当前位剩余的只能是 0 或 1
            $return = ($sum & 1) . $return;
        }
        return $return;
    }
}
