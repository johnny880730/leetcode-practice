<?php
/*
144. 二叉树的前序遍历
给定一个二叉树的根节点 root ，返回它的 前序 遍历。

输入：root = [1,null,2,3]
输出：[1,2,3]

https://leetcode-cn.com/problems/binary-tree-preorder-traversal/

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
class Solution144 {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $res = [];
        $this->preorder($root, $res);
        return $res;
    }

    function preorder($root, &$res) {
        if (!$root) {
            return;
        }
        $res[] = $root->val;
        $this->preorder($root->left, $res);
        $this->preorder($root->right, $res);

    }
}
