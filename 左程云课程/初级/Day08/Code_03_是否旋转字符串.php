<?php
/*
 * 想想一个字符串其实是个循环数组，可以循环右移。
 * 比如”abc”，
 * 向右循环右移一位，得到”cab”，
 * 向右循环右移两位，得到“bca”，
 * 向右循环右移三位，得到“abc”，
 *
 * 给定两个字符串str1和str2，判断str2是不是由str1循环右移得到的
 */

$obj = new Code_03_IsRotateString();
var_dump($obj->check('abcd', 'cdab'));

class Code_03_IsRotateString
{
    public function check($s1, $s2)
    {
        if (strlen($s1) != strlen($s2)) {
            return false;
        }
        return strpos(str_repeat($s1, 2), $s2) !== false;
    }

}