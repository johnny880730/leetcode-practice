<?php
/*
637. 二叉树的层平均值
给定一个非空二叉树, 返回一个由每层节点平均值组成的数组。



示例 1：

输入：
    3
   / \
  9  20
    /  \
   15   7
输出：[3, 14.5, 11]
解释：
第 0 层的平均值是 3 ,  第1层是 14.5 , 第2层是 11 。因此返回 [3, 14.5, 11] 。

https://leetcode-cn.com/problems/average-of-levels-in-binary-tree/

*/

require_once '../class/TreeNode.class.php';

$arr1  = [3, 9, 20, null, null, 15, 7];
$root = ListToTree::generateTree($arr1);

var_dump((new Solution637())->averageOfLevels($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution637
{
    // BFS
    function averageOfLevels($root)
    {
        $queue = new SplQueue();
        $queue->enqueue($root);

        $temp = [];
        $index = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();
                $temp[$index][] = $node->val;
                if ($node->left) {
                    $queue->enqueue($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right);
                }
            }
            $index++;
        }
        $res = [];
        foreach ($temp as $k => $item) {
            $res[$k] = array_sum($item) / count($item);
        }
        return $res;

    }


}
