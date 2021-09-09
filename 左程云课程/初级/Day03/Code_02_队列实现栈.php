<?php
/*
 * 仅用队列结构实现栈结构
 */

$s1 = new Code_TwoQueueStack();
$s1->push(1);
$s1->push(2);
echo $s1->peek() . PHP_EOL;
echo $s1->pop() . PHP_EOL;
echo intval($s1->empty()) . PHP_EOL;

class Code_TwoQueueStack
{
    private $queue;
    private $help;

    public function __construct()
    {
        $this->queue = new SplQueue();
        $this->help  = new SplQueue();
    }

    public function push($num)
    {
        $this->queue->enqueue($num);
    }

    public function peek()
    {
        return $this->queue->top();
    }

    public function pop()
    {
        if ($this->empty()) {
            return null;
        }
        while ($this->queue->count() != 1) {
            $this->help->enqueue($this->queue->dequeue());
        }
        $res = $this->queue->dequeue();

        $this->queue = $this->help;
        $this->help = new SplQueue();

        return $res;
    }

    public function empty()
    {
        return $this->queue->isEmpty() && $this->help->isEmpty();
    }

}