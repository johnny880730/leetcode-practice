<?php
/*
 打印两个有序链表的公共部分
 【题目】
 给定两个有序链表的头指针head1和head2，打印两个链表的公共部分。
 */
require_once '../../../class/ListNode.class.php';

$arr1 = [2,3,5,6];
$arr2 = [1,2,5,7,8];
$head1 = array2LinkList($arr1);
$head2 = array2LinkList($arr2);

getCommonPart($head1, $head2);


function getCommonPart($head1, $head2)
{
    while ($head1 != null && $head2 != null) {
        if ($head1->val < $head2->val) {
            $head1 = $head1->next;
        } else if ($head1->val > $head2->val) {
            $head2 = $head2->next;
        } else {
            echo $head1->val . ' ';
            $head1 = $head1->next;
            $head2 = $head2->next;
        }
    }
}
