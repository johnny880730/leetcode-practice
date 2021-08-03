<?php
/*
13. 罗马数字转整数

罗马数字包含以下七种字符:I，V，X，L，C，D和M。

字符          数值
I             1
V             5
X             10
L             50
C             100
D             500
M             1000
例如， 罗马数字 2 写做II，即为两个并列的 1。12 写做XII，即为X+II。 27 写做XXVII, 即为XX+V+II。

通常情况下，罗马数字中小的数字在大的数字的右边。但也存在特例，例如 4 不写做IIII，而是IV。数字 1 在数字 5 的左边，所表示的数等于大数 5 减小数 1 得到的数值 4 。同样地，数字 9 表示为IX。这个特殊的规则只适用于以下六种情况：

I可以放在V(5) 和X(10) 的左边，来表示 4 和 9。
X可以放在L(50) 和C(100) 的左边，来表示 40 和90。
C可以放在D(500) 和M(1000) 的左边，来表示400 和900。
给定一个罗马数字，将其转换成整数。输入确保在 1到 3999 的范围内。

示例1:
输入:"III"
输出: 3

示例2:
输入:"IV"
输出: 4

示例3:
输入:"IX"
输出: 9

示例4:
输入:"LVIII"
输出: 58
解释: L = 50, V= 5, III = 3.

示例5:
输入:"MCMXCIV"
输出: 1994
解释: M = 1000, CM = 900, XC = 90, IV = 4.


*/
$s = 'LVIII';
$o = new Solution013();
var_dump($o->romanToInt($s));
var_dump($o->romanToInt2($s));

class Solution013
{

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $result   = 0;
        $romanMap = ["I" => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
        for ($i = 0; $i < strlen($s); $i++) {
//            echo 'curr = ' . $s[$i] . ', num = ' . $romanMap[$s[$i]] . PHP_EOL;
            if (!isset($s[$i + 1]) || $romanMap[$s[$i]] >= $romanMap[$s[$i + 1]]) {
                $result += $romanMap[$s[$i]];
            } else {
                $result -= $romanMap[$s[$i]];
            }
        }
        return $result;
    }

    function romanToInt2($s)
    {
        $dic = [
            'I'  => 1,
            'V'  => 5,
            'X'  => 10,
            'L'  => 50,
            'C'  => 100,
            'D'  => 500,
            'M'  => 1000,
            'IV' => 4,
            'IX' => 9,
            'XL' => 40,
            'XC' => 90,
            'CD' => 400,
            'CM' => 900,
        ];

        $num = 0;
        $i   = 0;

        while ($i < strlen($s)) {
            $towBit = substr($s, $i, 2);
            if (array_key_exists($towBit, $dic)) {
                $num += $dic[$towBit];
                $i   += 2;
            } else {
                $oneBit = substr($s, $i, 1);
                if (array_key_exists($oneBit, $dic)) {
                    $num += $dic[$oneBit];
                    $i   += 1;
                }
            }
        }
        return $num;

    }


}
