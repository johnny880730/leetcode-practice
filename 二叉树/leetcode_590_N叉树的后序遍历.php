<?php
/*
590. N 叉树的后序遍历
给定一个 N 叉树，返回其节点值的 后序遍历 。

N 叉树 在输入中按层序遍历进行序列化表示，每组子节点由空值 null 分隔（请参见示例）。

进阶：

递归法很简单，你可以使用迭代法完成此题吗?



示例 1：
输入：root = [1,null,3,2,4,null,5,6]
输出：[5,6,3,2,4,1]

示例 2：
输入：root = [1,null,2,3,4,5,null,null,6,7,null,8,null,9,10,null,null,11,null,12,null,13,null,null,14]
输出：[2,6,14,11,7,3,12,8,4,13,9,10,5,1]


提示：
N 叉树的高度小于或等于 1000
节点总数在范围 [0, 10^4] 内

https://leetcode-cn.com/problems/n-ary-tree-postorder-traversal/

*/


/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */
class Solution590
{

    /**
     * @param Node $root
     * @return integer[]
     */
    function postorder($root)
    {
        $arr = [];
        $this->dfs($root, $arr);
        return $arr;
    }

    function dfs($node, &$arr)
    {
        if (!$node) {
            return;
        }
        foreach ($node->children as $child) {
            $this->dfs($child, $arr);
        }
        $arr[] = $node->val;
    }
}
