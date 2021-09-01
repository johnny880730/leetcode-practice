<?php
/*
412. Fizz Buzz
写一个程序，输出从 1 到 n 数字的字符串表示。

1. 如果 n 是3的倍数，输出“Fizz”；

2. 如果 n 是5的倍数，输出“Buzz”；

3.如果 n 同时是3和5的倍数，输出 “FizzBuzz”。

示例：
n = 15,

返回:
[
    "1",
    "2",
    "Fizz",
    "4",
    "Buzz",
    "Fizz",
    "7",
    "8",
    "Fizz",
    "Buzz",
    "11",
    "Fizz",
    "13",
    "14",
    "FizzBuzz"
]

https://leetcode-cn.com/problems/fizz-buzz/

*/

$n = 5;
var_dump((new Solution412())->fizzBuzz($n));

class Solution412
{
    function fizzBuzz($n)
    {
        $arr = [];
        for ($i = 1; $i <= $n; $i++) {
            switch ($i) {
                case $i % 15 == 0:
                    $arr[] = 'FizzBuzz';
                    break;
                case $i % 5 == 0:
                    $arr[] = 'Buzz';
                    break;
                case $i % 3 == 0:
                    $arr[] = 'Fizz';
                    break;
                default:
                    $arr[] = strval($i);
            }
        }
        return $arr;
    }




}
