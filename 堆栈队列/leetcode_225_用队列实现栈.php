<?php
/*
225. 用队列实现栈
请你仅使用两个队列实现一个后入先出（LIFO）的栈，并支持普通栈的全部四种操作（push、top、pop 和 empty）。

实现 MyStack 类：
void push(int x) 将元素 x 压入栈顶。
int pop() 移除并返回栈顶元素。
int top() 返回栈顶元素。
boolean empty() 如果栈是空的，返回 true ；否则，返回 false 。


注意：

你只能使用队列的基本操作 —— 也就是 push to back、peek/pop from front、size 和 is empty 这些操作。
你所使用的语言也许不支持队列。 你可以使用 list （列表）或者 deque（双端队列）来模拟一个队列 , 只要是标准的队列操作即可。


示例：

输入：
["MyStack", "push", "push", "top", "pop", "empty"]
[[], [1], [2], [], [], []]
输出：
[null, null, null, 2, 2, false]

解释：
MyStack myStack = new MyStack();
myStack.push(1);
myStack.push(2);
myStack.top(); // 返回 2
myStack.pop(); // 返回 2
myStack.empty(); // 返回 False


提示：
1 <= x <= 9
最多调用100 次 push、pop、top 和 empty
每次调用 pop 和 top 都保证栈不为空

https://leetcode-cn.com/problems/implement-stack-using-queues/

 */

class Solution225
{
    private $queue;
    private $help;

    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->queue = new SplQueue();
        $this->help  = new SplQueue();
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->queue->enqueue($num);
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop() {
        if ($this->queue->isEmpty()) {
            return null;
        }
        while ($this->queue->count() != 1) {
            $this->help->enqueue($this->queue->dequeue());
        }
        $res = $this->queue->dequeue();
        $this->swapQueue();
        return $res;
    }

    public function swapQueue()
    {
        $tmp = $this->help;
        $this->help = $this->queue;
        $this->queue = $tmp;
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top() {
        if ($this->queue->isEmpty()) {
            throw new Exception('empty');
        }
        while ($this->queue->count() != 1) {
            $this->help->enqueue($this->queue->dequeue());
        }
        $res = $this->queue->dequeue();
        $this->help->enqueue($res);
        $this->swapQueue();
        return $res;
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty() {
        return $this->queue->isEmpty();
    }
}
