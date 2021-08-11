<?php
/*
21. 合并两个有序链表
将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。

输入：l1 = [1,2,4], l2 = [1,3,4]
输出：[1,1,2,3,4,4]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/merge-two-sorted-lists/
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

require '../class/ListNode.class.php';

$arr1 = [1, 4, 6];
$arr2 = [1, 3, 4];

$head1 = array2LinkList($arr1);
$head2 = array2LinkList($arr2);

$o = new Solution021();
$a  = $o->mergeTwoLists($head1, $head2);
fetchNode($a);

class Solution021 {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $dummyHead = new ListNode(null);
        $cur = $dummyHead;
        while ($l1 || $l2) {
            if ($l1 && $l2 == null) {
                // l1非空 l2为空
                $cur->next = $l1;
                $l1 = $l1->next;
            } else if ($l2 && $l1 == null) {
                // l1为空 l2非空
                $cur->next = $l2;
                $l2 = $l2->next;
            } else if ($l1->val < $l2->val) {
                // l1 l2都不为空，l1的值小于l2的值，将指针指向l1，l1往后推进一格
                $cur->next = $l1;
                $l1 = $l1->next;
            } else {
                // l1 l2都不为空，l1的值大于l2的值，指针指向l2，l2往后推进一格
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            $cur = $cur->next;

        }
        return $dummyHead->next;
    }
}
