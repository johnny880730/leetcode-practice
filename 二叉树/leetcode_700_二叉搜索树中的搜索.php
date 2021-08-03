<?php
/*
700. 二叉搜索树中的搜索
给定二叉搜索树（BST）的根节点和一个值。 你需要在BST中找到节点值等于给定值的节点。 返回以该节点为根的子树。 如果节点不存在，则返回 NULL。

例如，

给定二叉搜索树:

        4
       / \
      2   7
     / \
    1   3

和值: 2
你应该返回如下子树:

      2
     / \
    1   3

https://leetcode-cn.com/problems/search-in-a-binary-search-tree/


*/

require_once '../class/TreeNode.class.php';

$arr1  = [4,2,7,1,3];
$target = 2;
$root = ListToTree::generateTree($arr1);

var_dump((new Solution700())->searchBST($root, $target));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution700
{
    function searchBST($root, $val)
    {
        if ($root == null) {
            return null;
        }
        if ($root->val == $val) {
            return $root;
        }
        if ($root->val < $val) {
            return $this->searchBST($root->right, $val);
        }
        if ($root->val > $val) {
            return $this->searchBST($root->left, $val);
        }
        return null;

    }

}
