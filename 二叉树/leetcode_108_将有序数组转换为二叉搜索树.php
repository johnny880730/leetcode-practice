<?php
/*
108. 将有序数组转换为二叉搜索树
将一个按照升序排列的有序数组，转换为一棵高度平衡二叉搜索树。

本题中，一个高度平衡二叉树是指一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1。

示例:

给定有序数组: [-10,-3,0,5,9],

一个可能的答案是：[0,-3,9,-10,null,5]，它可以表示下面这个高度平衡二叉搜索树：

      0
     / \
   -3   9
   /   /
 -10  5
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

(new Solution108())->sortedArrayToBST([-10,-3,0,5,9]);

class Solution108 {

    /**
     * 因本题的特性：高度平衡二叉搜索树
     * 注意这个高度平衡 这是能进行二分的关键。
     *
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums)
    {
        $len = sizeof($nums);
        return $this->create(0, $len - 1, $nums);
    }

    function create($l, $r, $nums)
    {
        if ($l > $r) {
            return null;
        }

        $mid         = ceil(($r - $l) / 2) + $l;
        $node        = new TreeNode($nums[$mid]);
        $node->left  = $this->create($l, $mid - 1, $nums);
        $node->right = $this->create($mid + 1, $r, $nums);

        return $node;
    }

}
