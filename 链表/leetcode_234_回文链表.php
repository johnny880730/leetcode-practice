<?php
/*
234. 回文链表
请判断一个链表是否为回文链表。

示例 1:
输入: 1->2
输出: false

示例 2:
输入: 1->2->2->1
输出: true

*/

require_once '../class/ListNode.class.php';

$arr1  = [1,2,2,1];

$head1 = array2LinkList($arr1);

$a = (new Solution206)->isPalindrome($head1);
var_dump($a);

class Solution206
{
    // 将链表的内容放到一个数组里，双指针判断
    function isPalindrome($head)
    {
        $arr = [];
        while ($head) {
            $arr[] = $head->val;
            $head = $head->next;
        }
        $i = 0;
        $j = count($arr) - 1;
        while ($i < $j) {
            if ($arr[$i] != $arr[$j]) {
                return false;
            }
            $i++;
            $j--;
        }
        return true;
    }

}
