<?php

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0)
    {
        $this->val = $val;
    }
}

// 数组转链表
function array2LinkList($arr)
{
    $head = new ListNode($arr[0]);
    $cur = $head;
    for ($i = 1; $i < count($arr); $i++) {
        $next=  new ListNode($arr[$i]);
        $cur->next = $next;
        $cur = $next;
    }

    return $head;
}

//遍历节点
function fetchNode($head)
{
    while ($head != null) {
        echo $head->val. ' ';
        $head = $head->next;
    }
    echo PHP_EOL;
}

// 打印双向链表
function printDoubleLinkedList($head) {
    echo "Double Linked List: ";
    $end = null;
    while ($head != null) {
        echo $head->value . ' ';
        $end = $head;
        $head = $head->next;
    }
    echo "| ";
    while ($end != null) {
        echo $end->value . ' ';
        $end = $end->last;
    }
    echo PHP_EOL;
}

