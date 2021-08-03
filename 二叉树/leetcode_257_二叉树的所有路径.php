<?php
/*
257. 二叉树的所有路径

给定一个二叉树，返回所有从根节点到叶子节点的路径。

说明:叶子节点是指没有子节点的节点。

示例:

输入:

   1
 /   \
2     3
 \
  5

输出: ["1->2->5", "1->3"]

解释: 所有根节点到叶子节点的路径为: 1->2->5, 1->3

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-paths
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

require_once '../class/TreeNode.class.php';

$arr = [1,2,3, null, 5];
$root = ListToTree::generateTree($arr);

var_dump((new Solution257())->binaryTreePaths($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution257 {

    /**
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root) {
        $res = [];
        if ($root == null)
            return $res;

        if ($root->left == null && $root->right == null) {
            $res[] = (String)$root->val;
            return $res;
        }

        $leftString = $this->binaryTreePaths($root->left);
        for ($i = 0; $i < count($leftString); $i++) {
            $res[] = (String)$root->val . '->' . $leftString[$i];
        }

        $rightString = $this->binaryTreePaths($root->right);
        for ($i = 0; $i < count($rightString); $i++) {
            $res[] = (String)$root->val . '->' . $rightString[$i];
        }

        return $res;

    }
}
