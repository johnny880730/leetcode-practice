<?php
/*
反转单向和双向链表
【题目】分别实现反转单向链表和反转双向链表的函数。

【要求】如果链表长度为N，时间复杂度要求为O(N)，额外空间复杂度要求为O(1)
 */
require_once '../../../class/ListNode.class.php';
// 单向
$head1 = new Node(1);
$head1->next = new Node(2);
$head1->next->next = new Node(3);
fetchNode($head1);
$newHead1 = reverse1($head1);
fetchNode($newHead1);

// 双向
$head2 = new DoubleNode(1);
$head2->next = new DoubleNode(2);
$head2->next->last = $head2;
$head2->next->next = new DoubleNode(3);
$head2->next->next->last = $head2->next;
$head2->next->next->next = new DoubleNode(4);
$head2->next->next->next->last = $head2->next->next;
printDoubleLinkedList($head2);
printDoubleLinkedList(reverse2($head2));


class Node {
    public $val;
    public $next;

    public function __construct($data) {
        $this->val = $data;
    }
}

class DoubleNode {
    public $value;
    public $last;
    public $next;
    
    public function __construct($data) {
        $this->value = $data;
    }
}

// 反转单向链表
function reverse1($head)
{
    $pre = null;
    while ($head != null ) {
        $next = $head->next;
        $head->next = $pre;
        $pre = $head;
        $head= $next;
    }
    return $pre;
}

// 反转双向链表
function reverse2($head)
{
    $pre = null;
	while ($head != null) {
        $next = $head->next;
        $head->next = $pre;
        $head->last = $next;
        $pre = $head;
        $head = $next;
    }
    return $pre;
}

/*
class Code_15_ReverseList {

	public static

	public static Node reverseList(Node head) {
		Node pre = null;
		Node next = null;
		while (head != null) {
			next = head.next;
			head.next = pre;
			pre = head;
			head = next;
		}
		return pre;
	}

	public static class DoubleNode {
		public int value;
		public DoubleNode last;
		public DoubleNode next;

		public DoubleNode(int data) {
			this.value = data;
		}
	}

	public static DoubleNode reverseList(DoubleNode head) {
		DoubleNode pre = null;
		DoubleNode next = null;
		while (head != null) {
			next = head.next;
			head.next = pre;
			head.last = next;
			pre = head;
			head = next;
		}
		return pre;
	}



	public static void printDoubleLinkedList(DoubleNode head) {
		System.out.print("Double Linked List: ");
		DoubleNode end = null;
		while (head != null) {
			System.out.print(head.value + " ");
			end = head;
			head = head.next;
		}
		System.out.print("| ");
		while (end != null) {
			System.out.print(end.value + " ");
			end = end.last;
		}
		System.out.println();
	}

	public static void main(String[] args) {
		Node head1 = new Node(1);
		head1.next = new Node(2);
		head1.next.next = new Node(3);
		printLinkedList(head1);
		head1 = reverseList(head1);
		printLinkedList(head1);

		DoubleNode head2 = new DoubleNode(1);
		head2.next = new DoubleNode(2);
		head2.next.last = head2;
		head2.next.next = new DoubleNode(3);
		head2.next.next.last = head2.next;
		head2.next.next.next = new DoubleNode(4);
		head2.next.next.next.last = head2.next.next;
		printDoubleLinkedList(head2);
		printDoubleLinkedList(reverseList(head2));

	}

}*/
