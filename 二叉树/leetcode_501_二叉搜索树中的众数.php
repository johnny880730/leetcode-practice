<?php
/*
501. 二叉搜索树中的众数
给定一个有相同值的二叉搜索树（BST），找出 BST 中的所有众数（出现频率最高的元素）。

假定 BST 有如下定义：

结点左子树中所含结点的值小于等于当前结点的值
结点右子树中所含结点的值大于等于当前结点的值
左子树和右子树都是二叉搜索树
例如：
给定 BST [1,null,2,2],

   1
    \
     2
    /
   2
返回[2].

提示：如果众数超过1个，不需考虑输出顺序

进阶：你可以不使用额外的空间吗？（假设由递归产生的隐式调用栈的开销不被计算在内）

https://leetcode-cn.com/problems/find-mode-in-binary-search-tree/

*/

require_once '../class/TreeNode.class.php';

$arr = [1, null, 2, 2];
$root = ListToTree::generateTree($arr);
var_dump((new Solution501())->findMode($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution501
{

    // 基础版，DFS，用了额外空间
    public function findMode($root)
    {
        $arr = [];
        $this->dfs($root, $arr);
        arsort($arr);
        $max = max($arr);
        $res = [];
        foreach ($arr as $k => $v) {
            if ($v == $max) {
                $res[] = $k;
            } else {
                break;
            }
        }
        return $res;
    }

    public function dfs($node, &$arr)
    {
        if ($node == null) {
            return null;
        }
        if (isset($arr[$node->val])) {
            $arr[$node->val]++;
        } else {
            $arr[$node->val] = 1;
        }
        if ($node->left) {
            $this->dfs($node->left, $arr);
        }
        if ($node->right) {
            $this->dfs($node->right, $arr);
        }
        return null;
    }

}
