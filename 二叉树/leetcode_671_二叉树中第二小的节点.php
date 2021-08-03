<?php
/*
671. 二叉树中第二小的节点
给定一个非空特殊的二叉树，每个节点都是正数，并且每个节点的子节点数量只能为 2 或 0。如果一个节点有两个子节点的话，那么该节点的值等于两个子节点中较小的一个。

更正式地说，root.val = min(root.left.val, root.right.val) 总成立。

给出这样的一个二叉树，你需要输出所有节点中的第二小的值。如果第二小的值不存在的话，输出 -1 。



示例 1：
输入：root = [2,2,5,null,null,5,7]
输出：5
解释：最小的值是 2 ，第二小的值是 5 。


示例 2：
输入：root = [2,2,2]
输出：-1
解释：最小的值是 2, 但是不存在第二小的值。


提示：

树中节点数目在范围 [1, 25] 内
1 <= Node.val <= 231 - 1
对于树中每个节点 root.val == min(root.left.val, root.right.val)


*/

require_once '../class/TreeNode.class.php';

$arr1  = [2,2,5,null,null,5,7];
$root = ListToTree::generateTree($arr1);

var_dump((new Solution671())->findSecondMinimumValue($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution671
{
    // 遍历后数组排序，去掉重复取第二小的值
    function findSecondMinimumValue($root)
    {
        $arr = [];
        $this->_inOrder($root, $arr);
        $arr = array_unique($arr);
        sort($arr);
        return count($arr) > 1 ? $arr[1] : -1;
    }

    function _inOrder($root, &$arr)
    {
        if ($root == null)
            return null;

        $this->_inOrder($root->left, $arr);
        $arr[] = $root->val;
        $this->_inOrder($root->right, $arr);
    }



}
