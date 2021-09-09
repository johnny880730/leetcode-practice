<?php
/*
两个单链表相交的一系列问题
【题目】
在本题中，单链表可能有环，也可能无环。
给定两个单链表的头节点$head1和$head2，这两个链表可能相交，也可能不相交。
请实现一个函数，如果两个链表相交，请返回相交的第一个节点；如果不相交，返回null即可。

要求：如果链表1的长度为N，链表2的长度为M，时间复杂度请达到O(N+M)，额外空间复杂度请达到O(1)。
 */
require_once '../../../class/ListNode.class.php';

// 1->2->3->4->5->6->7->null
$head1 = new ListNode(1);
$head1->next = new ListNode(2);
$head1->next->next = new ListNode(3);
$head1->next->next->next = new ListNode(4);
$head1->next->next->next->next = new ListNode(5);
$head1->next->next->next->next->next = new ListNode(6);
$head1->next->next->next->next->next->next = new ListNode(7);

// 0->9->8->6->7->null
$head2 = new ListNode(0);
$head2->next = new ListNode(9);
$head2->next->next = new ListNode(8);
$head2->next->next->next = $head1->next->next->next->next->next; // 8->6
var_dump(getIntersectListNode($head1, $head2)->val);

// 1->2->3->4->5->6->7->4...
$head1 = new ListNode(1);
$head1->next = new ListNode(2);
$head1->next->next = new ListNode(3);
$head1->next->next->next = new ListNode(4);
$head1->next->next->next->next = new ListNode(5);
$head1->next->next->next->next->next = new ListNode(6);
$head1->next->next->next->next->next->next = new ListNode(7);
$head1->next->next->next->next->next->next = $head1->next->next->next; // 7->4

// 0->9->8->2...
$head2 = new ListNode(0);
$head2->next = new ListNode(9);
$head2->next->next = new ListNode(8);
$head2->next->next->next = $head1->next; // 8->2
var_dump(getIntersectListNode($head1, $head2)->val);

// 0->9->8->6->4->5->6..
$head2 = new ListNode(0);
$head2->next = new ListNode(9);
$head2->next->next = new ListNode(8);
$head2->next->next->next = $head1->next->next->next->next->next; // 8->6
var_dump(getIntersectListNode($head1, $head2)->val);

function getIntersectListNode($head1, $head2)
{
    if ($head1 == null || $head2 == null) {
        return null;
    }
    // 获取两个链表各自是否为有环
    $loop1 = getLoopNode($head1);
	$loop2 = getLoopNode($head2);

    // 两个无环链表求第一个相交节点
    if ($loop1 == null && $loop2 == null) {
        return noLoop($head1, $head2);
    }

    // 两个有环链表求第一个相交节点
    if ($loop1 != null && $loop2 != null) {
        return bothLoop($head1, $loop1, $head2, $loop2);
    }

    // 一个有环有个无环不可能有相交节点（违背了单链表的定义），所以不用考虑直接返回空
    return null;
}

/*
 * 快慢指针判断是否有环：
 * 1、若快慢指针未相遇则表示链表无环
 * 2、若相遇，将快指针重置到head，和慢指针一起往前走，相遇的节点就是构成环的节点
 */
function getLoopNode($head) {
    if ($head == null || $head->next == null || $head->next->next == null) {
        return null;
    }
    $n1 = $head->next; // n1 -> slow
    $n2 = $head->next->next; // n2 -> fast
    while ($n1 != $n2) {
        if ($n2->next == null || $n2->next->next == null) {
            return null;
        }
        $n2 = $n2->next->next;
        $n1 = $n1->next;
    }
    $n2 = $head; // n2 -> walk again from $head
    while ($n1 != $n2) {
        $n1 = $n1->next;
        $n2 = $n2->next;
    }
    return $n1;
}

/*
 * 两个无环链表求第一个相交节点：
 * 1、获取两个链表的长度差值n
 * 2、更长的链表先走n步
 * 3、两个链表一起往前走，相交的节点就是答案
 */
function noLoop($head1, $head2) {
    if ($head1 == null || $head2 == null) {
        return null;
    }
    $cur1 = $head1;
	$cur2 = $head2;
	$n = 0;
	while ($cur1->next != null) {
        $n++;
        $cur1 = $cur1->next;
    }
	while ($cur2->next != null) {
        $n--;
        $cur2 = $cur2->next;
    }
    if ($cur1 != $cur2) {
        return null;
    }
    $cur1 = $n > 0 ? $head1 : $head2;
    $cur2 = $cur1 == $head1 ? $head2 : $head1;
    $n = abs($n);
    while ($n != 0) {
        $n--;
        $cur1 = $cur1->next;
    }
    while ($cur1 != $cur2) {
        $cur1 = $cur1->next;
        $cur2 = $cur2->next;
    }
    return $cur1;
}

/*
 * 两个有环链表求第一个相交节点：
 * 1、若两个链表的环节点相等的话（类似于一个Y字底下接一个环），类似无环的做法获取第一个相交节点
 * 2、若两个链表的环节点不相等，让其中一个环节点继续往下走。
 *    若回到自己表示两个链表没相交（这时两个链表可以看作两个6的样子）
 *    若碰到了另一个环的环节点则直接返回即可（两个环节点返回哪一个都行）
 */
function bothLoop($head1, $loop1, $head2, $loop2) {
    if ($loop1 == $loop2) {
        $cur1 = $head1;
        $cur2 = $head2;
        $n = 0;
        while ($cur1 != $loop1) {
            $n++;
            $cur1 = $cur1->next;
        }
        while ($cur2 != $loop2) {
            $n--;
            $cur2 = $cur2->next;
        }
        $cur1 = $n > 0 ? $head1 : $head2;
        $cur2 = $cur1 == $head1 ? $head2 : $head1;
        $n = abs($n);
        while ($n != 0) {
            $n--;
            $cur1 = $cur1->next;
        }
        while ($cur1 != $cur2) {
            $cur1 = $cur1->next;
            $cur2 = $cur2->next;
        }
        return $cur1;
    } else {
        $cur1 = $loop1->next;
        while ($cur1 != $loop1) {
            if ($cur1 == $loop2) {
                return $loop1;
            }
            $cur1 = $cur1->next;
        }
        return null;
    }
}

