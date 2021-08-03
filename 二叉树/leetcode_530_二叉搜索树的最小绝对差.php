<?php
/*
530. 二叉搜索树的最小绝对差
给你一棵所有节点为非负值的二叉搜索树，请你计算树中任意两节点的差的绝对值的最小值。

示例：

输入：

   1
    \
     3
    /
   2

输出：
1

解释：
最小绝对差为 1，其中 2 和 1 的差的绝对值为 1（或者 2 和 3）。


提示：

树中至少有 2 个节点。
本题与 783 https://leetcode-cn.com/problems/minimum-distance-between-bst-nodes/ 相同


https://leetcode-cn.com/problems/minimum-absolute-difference-in-bst/

*/

require_once '../class/TreeNode.class.php';

$arr = [4,2,6,1,3];
$root = ListToTree::generateTree($arr);
var_dump((new Solution530())->getMinimumDifference($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution530
{
    /*
     * 二叉搜索树，中序遍历是数组是升序的，最小差肯定在两个相邻元素中产生
     */
    function getMinimumDifference($root)
    {
        $arr = [];
        $this->_inOrder($root, $arr);
        return $this->_getMinDiffFromArray($arr);
    }

    protected function _inOrder($node, &$arr)
    {
        if ($node == null) {
            return null;
        }
        $this->_inOrder($node->left, $arr);
        $arr[] = $node->val;
        $this->_inOrder($node->right, $arr);
    }

    protected function _getMinDiffFromArray($arr)
    {
        $res = PHP_INT_MAX;
        $len = count($arr);
        for($i = 1; $i < $len; $i++) {
            $tmp = $arr[$i] - $arr[$i-1];
            if ($tmp < $res) {
                $res = $tmp;
            }
        }
        return $res;
    }

}
