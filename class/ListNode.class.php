<?php
/**
* Definition for a singly-linked list.
*/
class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0) {
        $this->val = $val;
    }
}

//遍历节点
function fetchNode($head){
    $current = $head;//在此需要注意一个问题，在php中对象的赋值，其实是对象地址的赋值，即$current = &$head，所以操作$current就相当于操作$head
    if ($head->val) {
        var_dump($current->val);
    }
    while(!is_null($current->next)){
        $current = $current->next;
        var_dump($current->val);
    }
}