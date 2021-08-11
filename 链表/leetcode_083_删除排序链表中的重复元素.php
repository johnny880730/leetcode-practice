<?php
/*
83. 删除排序链表中的重复元素
存在一个按升序排列的链表，给你这个链表的头节点 head ，请你删除所有重复的元素，使每个元素 只出现一次 。

返回同样按升序排列的结果链表。

示例 1：
输入：head = [1,1,2]
输出：[1,2]

https://leetcode-cn.com/problems/remove-duplicates-from-sorted-list/

*/

require '../class/ListNode.class.php';

$arr  = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 12];
$head = array2LinkList($arr);

$o = new Solution083();
$a = $o->deleteDuplicates($head);
fetchNode($a);

class Solution083
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        $curr = $head;
        while ($curr->next) {
            if ($curr->val == $curr->next->val) {
                $curr->next = $curr->next->next;
            } else {
                $curr = $curr->next;
            }
        }
        return $head;

    }
}
