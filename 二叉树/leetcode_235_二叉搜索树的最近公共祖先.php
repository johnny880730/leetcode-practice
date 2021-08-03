<?php
/*
257. 二叉树的所有路径

给定一个二叉搜索树, 找到该树中两个指定节点的最近公共祖先。

百度百科中最近公共祖先的定义为：“对于有根树 T 的两个结点 p、q，最近公共祖先表示为一个结点 x，满足 x 是 p、q 的祖先且 x 的深度尽可能大（一个节点也可以是它自己的祖先）。”

例如，给定如下二叉搜索树: root =[6,2,8,0,4,7,9,null,null,3,5]

      6
   /     \
  2       8
 / \     / \
0   4   7   9
   / \
  3   5

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-search-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

require_once '../class/TreeNode.class.php';

$arr = [6,2,8,0,4,7,9,null,null,3,5];
$root = ListToTree::generateTree($arr);
$p = 2;
$q = 8;

var_dump((new Solution235())->lowestCommonAncestor($root, $p, $q));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution235 {
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        if ($root == null)
            return null;

        // p、q的值都小于根，则从左子树中找
        if ($p->val < $root->val && $q->val < $root->val) {
            return $this->lowestCommonAncestor($root->left, $p, $q);
        }
        // p、q的值都大于根，则从右子树中找
        if ($p->val > $root->val && $q->val > $root->val) {
            return $this->lowestCommonAncestor($root->right, $p, $q);
        }
        // p、q在root的两边，或者p、q之一就是root的情况，公共祖先就是root
        return $root;
    }
}
