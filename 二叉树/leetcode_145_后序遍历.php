<?php
/*
145. 二叉树的后序遍历
给定一个二叉树的根节点 root ，返回它的 后序 遍历。

输入：root = [1,null,2,3]
输出：[3,2,1]

https://leetcode-cn.com/problems/binary-tree-postorder-traversal/

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
class Solution145 {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $res = [];
        $this->postorder($root, $res);
        return $res;
    }

    function postorder($root, &$res) {
        if (!$root) {
            return;
        }
        $this->postorder($root->left, $res);
        $this->postorder($root->right, $res);
        $res[] = $root->val;

    }
}
