<?php
/*
572. 另一棵树的子树
给你两棵二叉树 root 和 subRoot 。检验 root 中是否包含和 subRoot 具有相同结构和节点值的子树。如果存在，返回 true ；否则，返回 false 。

二叉树 tree 的一棵子树包括 tree 的某个节点和这个节点的所有后代节点。tree 也可以看做它自身的一棵子树。


示例 1：
输入：root = [3,4,5,1,2], subRoot = [4,1,2]
输出：true


示例 2：
输入：root = [3,4,5,1,2,null,null,null,null,0], subRoot = [4,1,2]
输出：false

提示：
root 树上的节点数量范围是 [1, 2000]
subRoot 树上的节点数量范围是 [1, 1000]
-104 <= root.val <= 104
-104 <= subRoot.val <= 104

https://leetcode-cn.com/problems/subtree-of-another-tree/

*/

require_once '../class/TreeNode.class.php';

$arr = [
    [3,4,5,1,2],
    [4,1,2]
];
//$arr2 = ;
$root = ListToTree::generateTree($arr[0]);
$rootubRoot = ListToTree::generateTree($arr[1]);

var_dump((new Solution572())->isSubtree($root, $rootubRoot));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution572
{

    function isSubtree($root, $subRoot) {
        if (!$subRoot) {
            return true;
        }
        if (!$root) {
            return false;
        }
        if ($this->isSameTree($root, $subRoot)) {
            return true;
        }

        return $this->isSubtree($root->left, $subRoot) || $this->isSubtree($root->right, $subRoot);
    }

    function isSameTree($l, $r) {
        if (!$l && !$r) {
            return true;
        }
        if (!$l || !$r) {
            return false;
        }
        if ($l->val != $r->val) {
            return false;
        }
        return $this->isSameTree($l->left, $r->left) && $this->isSameTree($l->right, $r->right);
    }


}
