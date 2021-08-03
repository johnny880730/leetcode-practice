<?php
/*
543. 二叉树的直径
给定一棵二叉树，你需要计算它的直径长度。一棵二叉树的直径长度是任意两个结点路径长度中的最大值。这条路径可能穿过也可能不穿过根结点。

示例 :
给定二叉树

          1
         / \
        2   3
       / \
      4   5
返回 3, 它的长度是路径 [4,2,1,3] 或者 [5,2,1,3]。



注意：两结点之间的路径长度是以它们之间边的数目表示。

https://leetcode-cn.com/problems/diameter-of-binary-tree/

*/

require_once '../class/TreeNode.class.php';

$arr = [1,2,3,4,5];
$root = ListToTree::generateTree($arr);
var_dump((new Solution543())->diameterOfBinaryTree($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution543
{
    private $ans;

    /*
     * 二叉树的直径 = 左子树最大高度 + 右子树最大高度
     */
    function diameterOfBinaryTree($root) {
        $this->ans = 0;
        $this->maxDepth($root);

        return $this->ans;
    }

    function maxDepth($root) {
        if (!$root) return 0;

        $lDepth = $this->maxDepth($root->left);
        $rDepth = $this->maxDepth($root->right);

        $this->ans = max($this->ans, $lDepth + $rDepth);

        return max($lDepth, $rDepth) + 1;
    }

}
