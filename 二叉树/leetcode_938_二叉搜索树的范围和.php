<?php
/*
938. 二叉搜索树的范围和
给定二叉搜索树的根结点 root，返回值位于范围 [low, high] 之间的所有结点的值的和。

示例 1：
输入：root = [10,5,15,3,7,null,18], low = 7, high = 15
输出：32

示例 2：
输入：root = [10,5,15,3,7,13,18,1,null,6], low = 6, high = 10
输出：23

https://leetcode-cn.com/problems/range-sum-of-bst/

*/

require_once '../class/TreeNode.class.php';

$arr = [10,5,15,3,7,13,18,1,null,6];
$low = 6;
$high = 10;
$root = ListToTree::generateTree($arr);

var_dump((new Solution938())->rangeSumBST($root, $low, $high));


class Solution938
{
    protected $arr = [];

    function rangeSumBST($root, $low, $high)
    {
        $this->_inOrder($root);

        $res = 0;
        foreach ($this->arr as $item) {
            if ($item >= $low && $item <= $high) {
                $res += $item;
            }
        }
        return $res;
    }

    // 中序遍历
    function _inOrder($root)
    {
        if ($root == null) {
            return null;
        }
        $this->_inOrder($root->left);
        $this->arr[] = $root->val;
        $this->_inOrder($root->right);
    }


}


