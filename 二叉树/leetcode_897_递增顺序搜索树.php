<?php
/*
897. 递增顺序搜索树
给你一棵二叉搜索树，请你 按中序遍历 将其重新排列为一棵递增顺序搜索树，使树中最左边的节点成为树的根节点，并且每个节点没有左子节点，只有一个右子节点。

示例 1：
输入：root = [5,3,6,2,4,null,8,1,null,null,null,7,9]
输出：[1,null,2,null,3,null,4,null,5,null,6,null,7,null,8,null,9]

示例 2：
输入：root = [5,1,7]
输出：[1,null,5,null,7]

提示：

树中节点数的取值范围是 [1, 100]
0 <= Node.val <= 1000

https://leetcode-cn.com/problems/increasing-order-search-tree/

*/

require_once '../class/TreeNode.class.php';

$arr = [5,3,6,2,4,null,8,1,null,null,null,7,9];
$root = ListToTree::generateTree($arr);

var_dump((new Solution897())->increasingBST($root));
var_dump((new Solution897())->increasingBST2($root));


class Solution897
{
    protected $arr = [];

    function increasingBST($root)
    {
        $this->_inOrder($root);

        $newRoot = $prev = null;
        for ($i = 0; $i < count($this->arr); $i++) {
            $curr = new TreeNode($this->arr[$i]);
            if ($i == 0) {
                $newRoot = $curr;
            }
            if ($prev) {
                $prev->right = $curr;
            }
            $prev = $curr;
        }
        return $newRoot;
    }

    // 自建个头节点
    function increasingBST2($root)
    {
        $this->_inOrder($root);

        $dummyNode = new TreeNode(-1);
        $curr = $dummyNode;
        foreach ($this->arr as $item) {
            $curr->right = new TreeNode($item);
            $curr = $curr->right;
        }

        return $dummyNode->right;
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


