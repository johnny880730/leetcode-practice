<?php
/*
515. 在每个树行中找最大值
您需要在二叉树的每一行中找到最大的值。

示例：

输入:

          1
         / \
        3   2
       / \   \
      5   3   9

输出: [1, 3, 9]

https://leetcode-cn.com/problems/find-largest-value-in-each-tree-row/
*/

class Solution515
{
    /**
     * 广度优先 BFS 同第102题
     * @param TreeNode $root
     * @return Integer[][]
     */
    function largestValues($root)
    {
        $res = $arr = [];
        if ($root == null) {
            return $res;
        }
        array_push($arr, $root);
        $level = 0;
        while ($count = count($arr)) {
            for ($i = $count; $i > 0; $i--) {
                $node          = array_shift($arr);//先入先出
                $res[$level] = max($node->val, $res[$level]);
                if ($node->left != null) array_push($arr, $node->left);
                if ($node->right != null) array_push($arr, $node->right);
            }
            $level++;
        }
        return $res;

    }

}
