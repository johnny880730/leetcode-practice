<?php
/*
110. 平衡二叉树
给定一个二叉树，判断它是否是高度平衡的二叉树。

本题中，一棵高度平衡二叉树定义为：

一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1 。
示例 1：
         3
        / \
       9   20
           / \
          15  7
输入：root = [3,9,20,null,null,15,7]
输出：true


示例 2：
                 1
                / \
               2   2
              / \
             3   3
            / \
           4   4
输入：root = [1,2,2,3,3,null,null,4,4]
输出：false


示例 3：
输入：root = []
输出：true


提示：
树中的节点数在范围 [0, 5000] 内
-104 <= Node.val <= 104
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
class Solution110
{

    /**
     * 根据定义，一棵二叉树是平衡二叉树，当且仅当其所有子树也都是平衡二叉树
     * @param ListNode $head
     * @return Boolean
     */
    function isBalanced($head)
    {
        if ($head == null) {
            return true;
        }
        $leftDepth  = $this->getTreeDepth($head->left);
        $rightDepth = $this->getTreeDepth($head->right);
        return abs($leftDepth - $rightDepth) <= 1
            && $this->isBalanced($head->left)
            && $this->isBalanced($head->right);
    }

    protected function getTreeDepth($node)
    {
        if ($node == null) {
            return 0;
        }
        $leftDepth  = $this->getTreeDepth($node->left);
        $rightDepth = $this->getTreeDepth($node->right);
        return max($leftDepth, $rightDepth) + 1;
    }


}
