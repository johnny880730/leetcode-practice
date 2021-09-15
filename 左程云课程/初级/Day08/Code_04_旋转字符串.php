<?php
/*
 * 给定一个字符串str，和一个整数k，返回str向右循环右移k位后的结果
 */

$obj = new Code_04_RotateString();
echo $obj->rotate('12345ABC', 5) . PHP_EOL;
echo $obj->rotate2('12345ABC', 5) . PHP_EOL;

class Code_04_RotateString
{
    // 根据k值分成，左右两部分。
    // 左半部分逆序、右半部分逆序、整体逆序 = 结果
    public function rotate($str, $k)
    {
        $arr = str_split($str);
        $len = strlen($str);
        $this->reverse($arr, 0, $k - 1);
        $this->reverse($arr, $k, $len - 1);
        $this->reverse($arr, 0, $len - 1);
        return join('', $arr);

    }

    public function reverse(&$arr, $left, $right)
    {
        while ($left < $right) {
            $tmp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $tmp;
            $left++;
            $right--;
        }
    }

    public function rotate2($str, $k)
    {
        $len = strlen($str);
        $newStr = $str . $str;
        return substr($newStr, $k, $len);
    }

}