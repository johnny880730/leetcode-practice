<?php
/*
101. 对称二叉树
给定一个二叉树，检查它是否是镜像对称的。



例如，二叉树 [1,2,2,3,4,4,3] 是对称的。
    1
   / \
  2   2
 / \ / \
3  4 4  3

但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:
    1
   / \
  2   2
   \   \
   3    3

https://leetcode-cn.com/problems/symmetric-tree/

*/


class Solution101
{
    /*
     * 如果同时满足下面的条件，两个树互为镜像：
     * 1、它们的两个根结点具有相同的值
     * 2、每个树的右子树都与另一个树的左子树镜像对称
     *
     * @param $root
     * @return bool
     */
    public function isSymmetric($root)
    {
        return $this->_isSymmetric($root, $root);
    }

    protected function _isSymmetric($left, $right)
    {
        if ($left == null && $right == null) {
            return true;
        }
        if ($left == null || $right == null) {
            return false;
        }
        if ($left->val != $right->val) {
            return false;
        }

        return $this->_isSymmetric($left->left, $right->right)
            && $this->_isSymmetric($left->right, $right->left);

    }
}
