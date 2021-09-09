<?php
/*
将单向链表按某值划分成左边小、中间相等、右边大的形式
【题目】
给定一个单向链表的头节点head，节点的值类型是整型，再给定一个整数pivot。
实现一个调整链表的函数，将链表调整为左部分都是值小于pivot的节点，中间部分都是值等于pivot的节点，右部分都是值大于pivot的节点。
除这个要求外，对调整后的节点顺序没有更多的要求。
例如：链表9->0->4->5->1，pivot=3。
调整后链表可以是1->0->4->9->5，也可以是0->1->9->5->4。
总之，满足左部分都是小于3的节点，中间部分都是等于3的节点（本例中这个部分为空），右部分都是大于3的节点即可。
对某部分内部的节点顺序不做要求。
 */
require_once '../../../class/ListNode.class.php';

$arr1 = [9,0,4,5,1];
$head1 = array2LinkList($arr1);
$pivot = 4;
$res = SmallerEqualBigger($head1, $pivot);
fetchNode($res);

// 将所有节点比较后放入大于、等于、小于的三个容器中，最后按顺序连起来
function SmallerEqualBigger($head, $pivot)
{
    $smallHead = $smallTail = null;
    $equalHead = $equalTail = null;
    $biggerHead = $biggerTail = null;
    while ($head != null) {
        $next = $head->next;
        $head->next = null;
        if ($head->val < $pivot) {
            if ($smallHead == null) {
                $smallHead = $head;
                $smallTail = $head;
            } else {
                $smallTail->next = $head;
                $smallTail = $head;
            }
        }
        if ($head->val == $pivot) {
            if ($equalHead == null) {
                $equalHead = $head;
                $equalTail = $head;
            } else {
                $equalTail->next = $head;
                $equalTail = $head;
            }
        }
        if ($head->val > $pivot) {
            if ($biggerHead == null) {
                $biggerHead = $head;
                $biggerTail = $head;
            } else {
                $biggerTail->next = $head;
                $biggerTail = $head;
            }
        }
        $head = $next;
    }
    // 小于的和等于的reconnect
    if ($smallTail != null) {
        $smallTail->next = $equalHead;
        $equalTail = $equalTail == null ? $smallTail : $equalTail;
    }
    // 全部连接
    if ($equalTail != null) {
        $equalTail->next = $biggerHead;
    }

    if ($smallHead != null) {
        return $smallHead;
    }
    if ($equalHead != null) {
        return $equalHead;
    }
    return $biggerHead;

}

