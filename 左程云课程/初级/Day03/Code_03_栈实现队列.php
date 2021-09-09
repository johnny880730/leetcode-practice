<?php
/*
 * 仅用队列结构实现栈结构
 */

$s1 = new Code_TwoStackQueue();
$s1->push(1);
$s1->push(2);
$s1->push(3);
$s1->push(4);
echo $s1->pop() . PHP_EOL;
echo intval($s1->empty()) . PHP_EOL;

class Code_TwoStackQueue
{
    private $stack;
    private $help;

    public function __construct()
    {
        $this->stack = new SplStack();
        $this->help  = new SplStack();
    }

    public function push($num)
    {
        $this->stack->push($num);
    }

    public function peek()
    {
        while (!$this->stack->isEmpty()) {
            $this->help->push($this->stack->pop());
        }
        $res = $this->help->top();
        while (!$this->help->isEmpty()) {
            $this->stack->push($this->help->pop());
        }
        return $res;
    }

    public function pop()
    {
        while ($this->stack->count() != 1) {
            $this->help->push($this->stack->pop());
        }
        $res = $this->stack->pop();
        while (!$this->help->isEmpty()) {
            $this->stack->push($this->help->pop());
        }
        return $res;
    }

    public function empty()
    {
        return $this->stack->isEmpty() && $this->help->isEmpty();
    }

}