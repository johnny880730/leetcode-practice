<?php
/*
404. 左叶子之和
计算给定二叉树的所有左叶子之和。

示例：

    3
   / \
  9  20
    /  \
   15   7

在这个二叉树中，有两个左叶子，分别是 9 和 15，所以返回 24

https://leetcode-cn.com/problems/sum-of-left-leaves/

*/

require_once '../class/TreeNode.class.php';

$arr = [3, 9, 20, null, null, 15, 7];
//$arr = [1,2,3,4,5];
$root = ListToTree::generateTree($arr);
var_dump((new Solution404())->sumOfLeftLeaves($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution404
{

    public function sumOfLeftLeaves($root)
    {
        $res = [];
        $this->getLeaf($root, $res);
        return array_sum($res);
    }

    public function getLeaf($node, &$res, $isLeft = false)
    {
        if ($node == null) {
            return null;
        }
        // 是叶子节点且是“左”叶子，数组扩充
        if ($node->left == null && $node->right == null) {
            if ($isLeft) {
                $res[] = $node->val;
            }
            return null;
        }
        if ($node->left) {
            $this->getLeaf($node->left, $res, true);
        }
        if ($node->right) {
            $this->getLeaf($node->right, $res, false);
        }

        return;
    }
}
