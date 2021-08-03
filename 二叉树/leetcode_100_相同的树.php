<?php
/*
100. 相同的树
给你两棵二叉树的根节点 p 和 q ，编写一个函数来检验这两棵树是否相同。

如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。

示例 1：
输入：p = [1,2,3], q = [1,2,3]
输出：true

示例 2：
输入：p = [1,2], q = [1,null,2]
输出：false

示例 3：
输入：p = [1,2,1], q = [1,1,2]
输出：false

提示：
两棵树上的节点数目都在范围 [0, 100] 内
-104 <= Node.val <= 104

https://leetcode-cn.com/problems/same-tree/

*/


class Solution100
{
    /*
     * 两个二叉树相同，当且仅当两个二叉树的结构完全相同，且所有对应节点的值相同。
     * 因此，可以通过搜索的方式判断两个二叉树是否相同。
     */
    public function isSameTree($p, $q)
    {
        if ($p == null && $q == null) {
            return true;
        }
        if ( $p == null || $q == null) {
            return false;
        }
        if ($p->val != $q->val) {
            return  false;
        }
        return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}
