<?php
/*
 * 实现一个特殊的栈，在实现栈的基本功能的基础上，再实现返回栈中最小元素的操作。
 * 【要求】
 * 1．pop、push、getMin操作的时间复杂度都是O(1)。
 * 2．设计的栈类型可以使用现成的栈结构
 */

$s1 = new Code_GetMinStack();
$s1->push(3);
echo $s1->getMin() . PHP_EOL;
$s1->push(4);
echo $s1->getMin() . PHP_EOL;
$s1->push(1);
echo $s1->getMin() . PHP_EOL;
echo $s1->pop() . PHP_EOL;
echo $s1->getMin() . PHP_EOL;

class Code_GetMinStack
{
    private $stackData;
    private $stackMin;

    public function __construct()
    {
        $this->stackData = new SplStack();
        $this->stackMin  = new SplStack();
    }

    public function push($num)
    {
        if ($this->stackMin->isEmpty()) {
            $this->stackMin->push($num);
        } else if ($num <= $this->getMin()) {
            $this->stackMin->push($num);
        }
        $this->stackData->push($num);
    }

    public function getMin()
    {
        if ($this->stackMin->isEmpty()) {
            throw new Exception('stack is empty');
        }
        return $this->stackMin->top();
    }

    public function pop()
    {
        if ($this->stackData->isEmpty()) {
            throw new Exception('stack is empty');
        }
        $val = $this->stackData->pop();
        if ($val == $this->getMin()) {
            $this->stackMin->pop();
        }
        return $val;
    }
}