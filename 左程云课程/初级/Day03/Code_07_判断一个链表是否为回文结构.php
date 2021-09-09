<?php
/*
判断一个链表是否为回文结构
【题目】给定一个链表的头节点head，请判断该链表是否为回文结构。例如：
1->2->1，返回true。
1->2->2->1，返回true。
15->6->15，返回true。
1->2->3，返回false。

进阶：如果链表长度为N，时间复杂度达到O(N)，额外空间复杂度达到O(1)。
 */
require_once '../../../class/ListNode.class.php';

$arr1 = [1,2,3];
$arr1 = [1,2,3,2,1];
$arr1 = [1,2,2,1];
$head1 = array2LinkList($arr1);
//$res = isPalindrome1($head1);
//$res = isPalindrome2($head1);
$res = isPalindrome3($head1);
var_dump($res);

//方法1：第一次遍历把值放入栈，再遍历第二次判断是否回文。空间复杂度 O(N)
function isPalindrome1($head)
{
    $stack = new SplStack();
    $cur = $head;
    while ($cur != null) {
        $stack->push($cur->val);
        $cur = $cur->next;
    }
    while ($head != null) {
        if (!$stack->isEmpty() && $head->val != $stack->pop()) {
            return false;
        }
        $head = $head->next;
    }
    return true;
}

//方法2：方法1的改进版。快慢指针获取到中间的节点，只把中间节点之后的放入栈再来比较。实际空间复杂度 O(N/2)
function isPalindrome2($head)
{
    $slow = $head;
    $fast = $head;
    while ($fast->next != null && $fast->next->next != null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }
    $stack = new SplStack();
    while ($slow != null) {
        $stack->push($slow->val);
        $slow = $slow->next;
    }
    while (!$stack->isEmpty()) {
        if ($head->val != $stack->pop()) {
            return false;
        }
        $head = $head->next;
    }
    return true;
}

//方法3：方法2的改进版。后半链表直接反转来检测是否回文。空间复杂度 O(1)
function isPalindrome3($head)
{
    $n1 = $head;
    $n2 = $head;
    while ($n2->next != null && $n2->next->next != null) {
        $n1 = $n1->next;        // n1 => mid
        $n2 = $n2->next->next;  // n2 => end
    }
    $n2 = $n1->next;    // n2 => 后半部分第一个节点
    $n1->next = null;   // mid->next = null
    // 反转后半部分链表。循环结束时n1指向的链表最后个节点
    while ($n2 != null) {
        $node = $n2->next;
        $n2->next = $n1;
        $n1 = $n2;
        $n2 = $node;
    }
    $n2 = $head;      //将n2回到head
    // 将n1 和 n2 往中间夹检测回文
    while ($n1 != null && $n2 != null) {
        if ($n1->val != $n2->val) {
            return false;
        }
        $n1 = $n1->next;
        $n2 = $n2->next;
    }
    return true;


}



