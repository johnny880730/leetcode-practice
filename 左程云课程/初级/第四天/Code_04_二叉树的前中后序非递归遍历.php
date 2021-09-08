<?php
/*
二叉树的前中后序【非递归】遍历
 */

require_once '../../../class/TreeNode.class.php';
$arr = [1,2,3,4,5,6,7];
/*
        1
     2      3
   4   5  6   7
 */
$head = ListToTree::generateTree($arr);

Code_NoneRecurOrder::preOrderNotRecur($head);
Code_NoneRecurOrder::inOrderNotRecur($head);
Code_NoneRecurOrder::postOrderNotRecur($head);

class Code_NoneRecurOrder
{

    // 非递归前序遍历：利用栈，注意子节点先放右孩子再放左孩子
    public static function preOrderNotRecur($head)
    {
        echo 'pre order : ';
        if ($head != null) {
            $stack = new SplStack();
            $stack->push($head);
            while (!$stack->isEmpty()) {
                $node = $stack->pop();
                echo $node->val . ' ';
                if ($node->right != null) {
                    $stack->push($node->right);
                }
                if ($node->left != null) {
                    $stack->push($node->left);
                }
            }
        }
        echo PHP_EOL;
    }

    // 非递归中序遍历：利用栈。略微复杂
    public static function inOrderNotRecur($head)
    {
        echo 'in order  : ';
        $stack = new SplStack();
        while (!$stack->isEmpty() || $head != null) {
            if ($head != null) {
                $stack->push($head);
                $head = $head->left;
            } else {
                $head = $stack->pop();
                echo $head->val . ' ';
                $head = $head->right;
            }
        }
        echo PHP_EOL;
    }

    // 后序非递归遍历：与前序相似，多一个help栈来反向输出。
    // 前序是本体+右+左来压栈，后续是本体+左+右来压栈，取出时候压入help栈
    public static function postOrderNotRecur($head)
    {
        echo 'post order: ';
        if ($head != null) {
            $help  = new SplStack();
            $stack = new SplStack();
            $stack->push($head);
            while (!$stack->isEmpty()) {
                $node = $stack->pop();
                $help->push($node);
                if ($node->left != null) {
                    $stack->push($node->left);
                }
                if ($node->right != null) {
                    $stack->push($node->right);
                }
            }
            while (!$help->isEmpty()) {
                echo $help->pop()->val .' ';
            }
        }
        echo PHP_EOL;
    }
}