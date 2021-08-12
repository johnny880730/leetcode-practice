<?php
/*
203. 移除链表元素
给你一个链表的头节点 head 和一个整数 val ，请你删除链表中所有满足 Node.val == val 的节点，并返回 新的头节点 。


示例 1：
输入：head = [1,2,6,3,4,5,6], val = 6
输出：[1,2,3,4,5]

示例 2：
输入：head = [], val = 1
输出：[]

示例 3：
输入：head = [7,7,7,7], val = 7
输出：[]

提示：
列表中的节点数目在范围 [0, 104] 内
1 <= Node.val <= 50
0 <= val <= 50

https://leetcode-cn.com/problems/remove-linked-list-elements/

*/

require_once '../class/ListNode.class.php';

$arr1  = [1, 2, 6, 3, 4, 5, 6];
$val   = 6;

$arr1 = [7, 7, 7, 7];
$val = 7;

$arr1 = [1, 2];
$val = 1;

$head1 = array2LinkList($arr1);

$a = (new Solution203)->removeElements($head1, $val);
fetchNode($a);


class Solution203
{

    function removeElements($head, $val)
    {
        $dummyHead = new ListNode();
        $dummyHead->next = $head;
        $cur = $dummyHead;
        while ($cur->next) {
            if ($cur->next->val == $val) {
                $cur->next = $cur->next->next;
            } else {
                $cur = $cur->next;
            }
        }
        return $dummyHead->next;
    }
}
