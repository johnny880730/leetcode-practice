<?php
/*
 * 母牛每年生一只母牛，新出生的母牛成长三年后也能每年生一只母牛，假设不会死。
 * 求N年后，母牛的数量
 * n=1, A,  num=1
 * n=2, A=>B, AB, num=2
 * n=3, A=>C, ABC, num=3
 * n=4, A=>D, ABCD, num=4
 * n=5, B成熟=>E, A=>F, ABCDEF, num=6
 * n=6, C成熟=>G, B=>H, A=>I, ABCDEFGHI, num=9
 *
 * f(1)=1, f(2)=2, f(3)=3
 * 当n>=4 f(n)=f(n-1)+f(n-3)，也就是去年留下来的牛 + 三年前的牛生的等量牛
 *
 */

$n = 7;
$obj = new Code_GetCowNum();
echo $obj->getNum($n);

class Code_GetCowNum
{
    public $cache = [
        1 => 1,
        2 => 2,
        3 => 3,
    ];

    public function getNum($n)
    {
        if ($n <= 3) {
            return $this->cache[$n];
        }
        $this->cache[$n] = self::getNum($n-1) + self::getNum($n-3);
        return $this->cache[$n];
    }


}