<?php
/*
 * 给你一个栈，请你逆序这个栈
 * 不能申请额外的数据结构，只能使用递归函数。如何实现？
 */

$stack = new SplStack();
$stack->push(3);
$stack->push(2);
$stack->push(1);
/*
 * |  1  |
 * |  2  |
 * |  3  |
 * _ _ _ _
 */
$obj = new Code_ReverseStack();
echo $obj->reverse($stack);

class Code_ReverseStack
{
    // 利用递归逆序一个栈
    public function reverse($stack)
    {
        if ($stack->isEmpty()) {
            return;
        }
        $i = $this->getAndRemoveLastElement($stack);
        $this->reverse($stack);
        $stack->push($i);
    }

    // 获取栈底的元素并从栈中移除该元素
    public function getAndRemoveLastElement(SplStack $stack)
    {
        $res = $stack->pop();
        if ($stack->isEmpty()) {
            return $res;
        } else {
            $last = $this->getAndRemoveLastElement($stack);
            $stack->push($res);
            return $last;
        }
    }


}