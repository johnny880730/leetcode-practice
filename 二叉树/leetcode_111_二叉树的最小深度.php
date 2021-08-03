<?php
/*
111. 二叉树的最小深度

给定一个二叉树，找出其最小深度。

最小深度是从根节点到最近叶子节点的最短路径上的节点数量。

说明:叶子节点是指没有子节点的节点。

示例:

给定二叉树[3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7
返回它的最小深度 2.

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/minimum-depth-of-binary-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
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

(new Solution111)->minDepth2('aaa');

class Solution111
{
    // DFS
    function minDepth($root) {
        if ($root == null)
            return 0;

        if (!$root->left)
            return 1 + $this->minDepth($root->right);
        if (!$root->right)
            return 1 + $this->minDepth($root->left);

        $leftMinDepth = $this->minDepth($root->left);
        $rightMinDepth = $this->minDepth($root->right);
        return 1 + min($leftMinDepth, $rightMinDepth);
    }

    // BFS
    function minDepth2($root)
    {
        if ($root == null) {
            return 0;
        }
        $queue = new SplQueue();
        $queue->enqueue([$root, 1]);        //1=初始深度
        while (!$queue->isEmpty()) {
            list($node, $depth) = $queue->dequeue();
            if ($node->left == null && $node->right == null) {
                return $depth;
            }
            if ($node->left != null) {
                $queue->enqueue([$node->left, $depth + 1]);
            }
            if ($node->right != null) {
                $queue->enqueue([$node->right, $depth + 1]);
            }
        }
        return 0;
    }
}
