<?php
/*
206. 反转链表
给你单链表的头节点 head ，请你反转链表，并返回反转后的链表。


示例 1：
输入：head = [1,2,3,4,5]
输出：[5,4,3,2,1]

示例 2：
输入：head = [1,2]
输出：[2,1]

示例 3：
输入：head = []
输出：[]


提示：

链表中节点的数目范围是 [0, 5000]
-5000 <= Node.val <= 5000

*/

require_once '../class/ListNode.class.php';

$arr1  = [1,2,3,4,5,6];

$head1 = array2LinkList($arr1);

$a = (new Solution206)->reverseList($head1);
fetchNode($a);


class Solution206
{

    function reverseList($head)
    {
        $prev = new ListNode(null);
        $cur = $head;
        while ($cur) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }
        $head->next = null;
        return $prev;
    }
}
