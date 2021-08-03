<?php
/*
653. 两数之和 IV - 输入 BST
给定一个二叉搜索树 root 和一个目标结果 k，如果 BST 中存在两个元素且它们的和等于给定的目标结果，则返回 true。

示例 1：
输入: root = [5,3,6,2,4,null,7], k = 9
输出: true

示例 2：
输入: root = [5,3,6,2,4,null,7], k = 28
输出: false

示例 3：
输入: root = [2,1,3], k = 4
输出: true

示例 4：
输入: root = [2,1,3], k = 1
输出: false

示例 5：
输入: root = [2,1,3], k = 3
输出: true


提示:
二叉树的节点个数的范围是  [1, 104].
-104 <= Node.val <= 104
root 为二叉搜索树
-105 <= k <= 105

https://leetcode-cn.com/problems/two-sum-iv-input-is-a-bst/


*/

require_once '../class/TreeNode.class.php';

$arr1  = [5,3,6,2,4,null,7];
$k = 9;
$root = ListToTree::generateTree($arr1);

//var_dump((new Solution657())->findTarget($root, $k));
var_dump((new Solution657())->findTarget2($root, $k));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution657
{

    // 遍历获取数组，回到twoSum的问题
    function findTarget($root, $k)
    {
        $arr = [];
        $this->_inOrder($root, $arr);
        return $this->_twoSum($arr, $k);
    }

    // 中序遍历BST获取升序数组  用BST的性质【推荐】
    function findTarget2($root, $k)
    {
        $arr = [];
        $this->_inOrder($root, $arr);
        return $this->_check($arr, $k);
    }

    // 中序遍历
    function _inOrder($node, &$arr)
    {
        if ($node == null) {
            return null;
        }
        $this->_inOrder($node->left, $arr);
        $arr[] = $node->val;
        $this->_inOrder($node->right, $arr);
    }


    function _twoSum($arr, $target)
    {
        $found = [];
        foreach ($arr as $key => $val) {
            $diff = $target - $val;
            if (isset($found[$diff])) {
                return true;
            } else {
                $found[$val] = $key;
            }
        }
        return false;
    }

    function _check($arr, $target)
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left < $right) {
            $sum = $arr[$left] + $arr[$right];
            if ($sum == $target) {
                return true;
            } else if ($sum < $target) {
                $left++;
            } else if ($sum > $target) {
                $right--;
            }
        }
        return false;
    }


}
