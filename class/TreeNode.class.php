<?php

/**
 * Definition for a binary tree node.
 */
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}


$arr = [5, 4, 8, 11, null, 13, 4, 7, 2, null, null, null, 1];
//var_dump(ListToTree::generateTree($arr));

// 将数组生成二叉树
class ListToTree
{
    public static function generateTree($arr)
    {
        $len = count($arr);
        if ($len == 0) {
            return null;
        }
        $index = 0;
        $head = new TreeNode($arr[$index]);
        $queue = new SplQueue();
        $queue->enqueue($head);
        while ($index < $len) {
            $index++;
            if ($index >= $len) {
                return $head;
            }
            $cur = $queue->dequeue();
            $leftVal = $arr[$index];
            if ($leftVal !== null) {
                $cur->left = new TreeNode($leftVal);
                $queue->enqueue($cur->left);
            }

            $index++;
            if ($index >= $len) {
                return $head;
            }
            $rightVal = $arr[$index];
            if ($rightVal !== null) {
                $cur->right = new TreeNode($rightVal);
                $queue->enqueue($cur->right);
            }
        }
        return $head;
    }
}


