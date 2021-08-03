<?php
/*
102. 二叉树的层序遍历
给你一个二叉树，请你返回其按 层序遍历 得到的节点值。 （即逐层地，从左到右访问所有节点）。


示例：
二叉树：[3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7
返回其层次遍历结果：

[
  [3],
  [9,20],
  [15,7]
]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-level-order-traversal
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

class Solution102
{
    // 用数组的 BFS
    function levelOrder($root)
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
                $res[$level][] = $node->val;
                if ($node->left != null) array_push($arr, $node->left);
                if ($node->right != null) array_push($arr, $node->right);
            }
            $level++;
        }
        return $res;
    }

    // 用队列的 BFS
    function levelOrder2($root)
    {
        $res = [];
        if ($root == null) {
            return $res;
        }

        $queue = new SplQueue();
        $queue->enqueue($root);

        $index = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();
                $res[$index][] = $node->val;
                if ($node->left) {
                    $queue->enqueue($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right);
                }
            }
            $index++;
        }
        return $res;
    }

}
