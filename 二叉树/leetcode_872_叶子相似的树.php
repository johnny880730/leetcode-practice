<?php
/*
872. 叶子相似的树
请考虑一棵二叉树上所有的叶子，这些叶子的值按从左到右的顺序排列形成一个 叶值序列 。



如果有两棵二叉树的叶值序列是相同，那么我们就认为它们是 叶相似 的。

如果给定的两个根结点分别为 root1 和 root2 的树是叶相似的，则返回 true；否则返回 false 。


示例 1：
输入：root1 = [3,5,1,6,2,9,8,null,null,7,4], root2 = [3,5,1,6,7,4,2,null,null,null,null,null,null,9,8]
输出：true

示例 2：
输入：root1 = [1], root2 = [1]
输出：true

示例 3：
输入：root1 = [1], root2 = [2]
输出：false

示例 4：
输入：root1 = [1,2], root2 = [2,2]
输出：true

示例 5：
输入：root1 = [1,2,3], root2 = [1,3,2]
输出：false

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/leaf-similar-trees
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

require_once '../class/TreeNode.class.php';

$arr = [
    [3,5,1,6,2,9,8,null,null,7,4],
    [3,5,1,6,7,4,2,null,null,null,null,null,null,9,8],
];

$arr = [
    [1],
    [2],
];

$root1 = ListToTree::generateTree($arr[0]);
$root2 = ListToTree::generateTree($arr[1]);

var_dump((new Solution872())->leafSimilar($root1, $root2));


class Solution872 {

    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2)
    {
        $arr1 = $arr2 = [];
        $this->getLeafArr($root1, $arr1);
        $this->getLeafArr($root2, $arr2);
        return $arr1 === $arr2;
    }

    function getLeafArr($root, &$arr)
    {
        if ($root == null) {
            return null;
        }
        if ($root->left == null && $root->right == null) {
            $arr[] = $root->val;
        }

        $this->getLeafArr($root->left, $arr);
        $this->getLeafArr($root->right, $arr);
        return $arr;
    }
}


