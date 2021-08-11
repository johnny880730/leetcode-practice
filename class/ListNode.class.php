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
    //在此需要注意一个问题，在php中对象的赋值，其实是对象地址的赋值，
    //即$current = &$head，所以操作$current就相当于操作$head
    $current = $head;
    if ($head->val) {
        var_dump($current->val);
    }
    while (!is_null($current->next)) {
        $current = $current->next;
        var_dump($current->val);
    }
}

