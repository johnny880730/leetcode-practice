<?php
/*
965. 单值二叉树
如果二叉树每个节点都具有相同的值，那么该二叉树就是单值二叉树。

只有给定的树是单值二叉树时，才返回 true；否则返回 false。



示例 1：
输入：[1,1,1,1,1,null,1]
输出：true


示例 2：
输入：[2,2,2,5,2]
输出：false


提示：

给定树的节点数范围是 [1, 100]。
每个节点的值都是整数，范围为 [0, 99] 。

https://leetcode-cn.com/problems/univalued-binary-tree/

*/

require_once '../class/TreeNode.class.php';

$arr = [2,2,2,5,2];
$root = ListToTree::generateTree($arr);

var_dump((new Solution965())->isUnivalTree($root));


class Solution965
{
    protected $arr = [];

    function isUnivalTree($root) {
        $this->dfs($root);
        $arr = array_unique($this->arr);
        return count($arr) == 1;
    }

    function dfs($root)
    {
        if ($root == null) {
            return null;
        }
        $this->arr[] = $root->val;
        $this->dfs($root->left);
        $this->dfs($root->right);
    }


}


