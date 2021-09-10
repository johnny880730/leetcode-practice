<?php
/*
 * 给定两个数组w和v，两个数组长度相等，
 * w[i]表示第i件商品的重量，
 * v[i]表示第i件商品的价值。
 * 再给定一个整数bag，要求你挑选商品的重量加起来一定不能超过bag.
 * 返回满足这个条件下，你能获得的最大价值。
 */

$w   = [3, 2, 4, 7];
$v   = [5, 6, 3, 19];
$bag = 11;
var_dump(Code_StealMaxValue::getMaxValue1($w, $v, $bag));
var_dump(Code_StealMaxValue::getMaxValue2($w, $v, $bag));

class Code_StealMaxValue
{
    // 递归
    public static function getMaxValue1($w, $v, $bag)
    {
        return self::process($w, $v, $bag, 0, 0);
    }

    public static function process($w, $v, $bag, $i, $alreadyWeight)
    {
        if ($alreadyWeight > $bag) {
            return PHP_INT_MIN;
        }
        if ($i == count($w)) {
            return 0;
        }
        return max(
            self::process($w, $v, $bag, $i+1, $alreadyWeight),
            $v[$i] + self::process($w, $v, $bag, $i+1, $alreadyWeight + $w[$i])
        );
    }

    // dp
    public static function getMaxValue2($weight, $value, $bag)
    {
        $len = count($weight);
        // dp[i][j] => 第i个货物，当前背包重量为j时候的最大收益
        $dp  = array_fill(0, $len + 1, array_fill(0, $bag + 1, 0));
        for ($i = $len-1; $i >= 0; $i--) {
            for ($j = $bag; $j >= 0; $j--) {
                $dp[$i][$j] = $dp[$i + 1][$j];
                if ($j + $weight[$i] <= $bag) {
                    $dp[$i][$j] = max($dp[$i + 1][$j], $value[$i] + $dp[$i+1][$j + $weight[$i]]);
                }
            }
        }
        print_r($dp);die;
        return $dp[0][0];
    }

}