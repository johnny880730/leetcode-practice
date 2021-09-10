<?php
/*
 * 汉诺塔
 * 打印N层汉诺塔从最左边移到最右边的过程
 */

$n = 5;
Code_Hanoi::hanoi($n);

class Code_Hanoi
{
    public static function hanoi($n)
    {
        self::move($n, 'left', 'right', 'mid');
    }

    /*
     * N个盘当前位置在from杆，目标是移动到to杆，有个辅助用杆help
     * 要挪N个盘，有以下三步：
     * 1、将1~N-1个盘从 from => help，借助to杆
     * 2、将第N盘从 from => to
     * 3、将1~N-1从help => to，借助from杆
     * 递归
     */
    public static function move($n, $from, $to, $help)
    {
        if ($n == 1) {
            echo "move 1 from {$from} to {$to}" . PHP_EOL;
        } else {
            self::move($n-1, $from, $help, $to);
            echo "move $n from {$from} to {$to}" . PHP_EOL;
            self::move($n-1, $help, $to, $from);
        }
    }


}