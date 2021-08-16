<?php
/*
1290. 二进制链表转整数
给你一个单链表的引用结点head。链表中每个结点的值不是 0 就是 1。已知此链表是一个整数数字的二进制表示形式。

请你返回该链表所表示数字的 十进制值 。

示例 1：
输入：head = [1,0,1]
输出：5
解释：二进制数 (101) 转化为十进制数 (5)

示例 2：
输入：head = [0]
输出：0

示例 3：
输入：head = [1]
输出：1

示例 4：
输入：head = [1,0,0,1,0,0,1,1,1,0,0,0,0,0,0]
输出：18880

示例 5：
输入：head = [0,0]
输出：0


提示：

链表不为空。
链表的结点总数不超过30。
每个结点的值不是0 就是 1。

https://leetcode-cn.com/problems/convert-binary-number-in-a-linked-list-to-integer

*/

require_once '../class/ListNode.class.php';
$arr1 = [0];
$arr1 = [1,0,1,0];
$head = array2LinkList($arr1);
$a    = (new Solution1290())->getDecimalValue($head);
var_dump($a);

class Solution1290
{

    function getDecimalValue($head)
    {
        $str = '';
        $cur = $head;
        $len = 0;
        while ($cur) {
            $str .= $cur->val;
            $cur  = $cur->next;
            $len++;
        }
        $res = 0;
        for ($i = 0; $i < $len; $i++) {
            $res += $str[$i] * pow(2, $len - $i - 1);
        }
        return $res;

    }

}


