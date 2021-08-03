<?php
/*
94. 二叉树的中序遍历
给定一个二叉树的根节点 root ，返回它的 中序 遍历。

输入：root = [1,null,2,3]
输出：[1,3,2]

https://leetcode-cn.com/problems/binary-tree-inorder-traversal/

*/


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution094 {
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $res = [];
        $this->inorder($root, $res);
        return $res;
    }

    function inorder($root, &$res) {
        if (!$root) {
            return;
        }
        $this->inorder($root->left, $res);
        $res[] = $root->val;
        $this->inorder($root->right, $res);

    }
}
