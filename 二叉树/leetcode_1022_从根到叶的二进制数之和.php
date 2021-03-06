<?php
/*
1022. 从根到叶的二进制数之和
给出一棵二叉树，其上每个结点的值都是 0 或 1 。每一条从根到叶的路径都代表一个从最高有效位开始的二进制数。例如，如果路径为 0 -> 1 -> 1 -> 0 -> 1，那么它表示二进制数 01101，也就是 13 。

对树上的每一片叶子，我们都要找出从根到该叶子的路径所表示的数字。

返回这些数字之和。题目数据保证答案是一个 32 位 整数。



示例 1：
                1
               / \
              0   1
             / \  / \
            0  1  0  1

输入：root = [1,0,1,0,1,0,1]
输出：22
解释：(100) + (101) + (110) + (111) = 4 + 5 + 6 + 7 = 22


https://leetcode-cn.com/problems/sum-of-root-to-leaf-binary-numbers/


*/

require_once '../class/TreeNode.class.php';

$arr = [1,0,1,0,1,0,1];
//$arr = [1,1];
$root = ListToTree::generateTree($arr);

var_dump((new Solution1022())->sumRootToLeaf($root));


class Solution1022
{

    protected $arr;


    function sumRootToLeaf($root) {
        $arr = [];
        $this->dfs($root, '', $arr);
        $res = 0;
        foreach ($arr as $item) {
            $res += bindec(strval($item));
        }
        return $res;
    }

    function dfs($root, $str, &$arr)
    {
        if ($root == null) {
            return;
        }
        $str .= $root->val;
        if ($root->left == null && $root->right == null) {
            $arr[] = $str;
            return;
        }
        $this->dfs($root->left, $str, $arr);
        $this->dfs($root->right, $str, $arr);

    }



}


