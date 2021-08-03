<?php
/*
226. 翻转二叉树

翻转一棵二叉树。

示例：

输入：

     4
   /   \
  2     7
 / \   / \
1   3 6   9
输出：

     4
   /   \
  7     2
 / \   / \
9   6 3   1

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/invert-binary-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

require_once '../class/TreeNode.class.php';

$arr = [2, 3, 1, 2, 4, 3];
$arr = [4,2,7,1,3,6,9];
$root = ListToTree::generateTree($arr);
var_dump($root);

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution226 {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if ($root == null) {
            return null;
        }

        $tmp = $root->left;
        $root->left = $root->right;
        $root->right = $tmp;

        $this->invertTree($root->left);
        $this->invertTree($root->right);

        return $root;

    }
}
