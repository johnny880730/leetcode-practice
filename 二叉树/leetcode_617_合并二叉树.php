<?php
/*
617. 合并二叉树
给定两个二叉树，想象当你将它们中的一个覆盖到另一个上时，两个二叉树的一些节点便会重叠。

你需要将他们合并为一个新的二叉树。合并的规则是如果两个节点重叠，那么将他们的值相加作为节点合并后的新值，否则不为 NULL 的节点将直接作为新二叉树的节点。

示例 1:

输入:
	Tree 1                     Tree 2
          1                         2
         / \                       / \
        3   2                     1   3
       /                           \   \
      5                             4   7
输出:
合并后的树:
	     3
	    / \
	   4   5
	  / \   \
	 5   4   7
注意: 合并必须从两个树的根节点开始。

https://leetcode-cn.com/problems/merge-two-binary-trees/

*/

require_once '../class/TreeNode.class.php';

$arr1  = [1, 3, 2, 5];
$arr2  = [2, 1, 3, null, 4, null, 7];
$root1 = ListToTree::generateTree($arr1);
$root2 = ListToTree::generateTree($arr2);

var_dump((new Solution617())->mergeTrees($root1, $root2));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution617
{
    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees($root1, $root2)
    {
        if ($root1 == null && $root2 == null) {
            return null;
        }
        $val1 = $root1 == null ? 0 : intval($root1->val);
        $val2 = $root2 == null ? 0 : intval($root2->val);
        // 新树
        $root = new TreeNode($val1 + $val2);
        $root->left = $this->mergeTrees($root1->left, $root2->left);
        $root->right = $this->mergeTrees($root1->right, $root2->right);
        return $root;
    }


}
