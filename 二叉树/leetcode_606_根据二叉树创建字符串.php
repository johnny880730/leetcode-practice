<?php
/*
606. 根据二叉树创建字符串
你需要采用前序遍历的方式，将一个二叉树转换成一个由括号和整数组成的字符串。

空节点则用一对空括号 "()" 表示。而且你需要省略所有不影响字符串与原始二叉树之间的一对一映射关系的空括号对。

示例 1:

输入: 二叉树: [1,2,3,4]
       1
     /   \
    2     3
   /
  4

输出: "1(2(4))(3)"

解释: 原本将是“1(2(4)())(3())”，
在你省略所有不必要的空括号对之后，
它将是“1(2(4))(3)”。
示例 2:

输入: 二叉树: [1,2,3,null,4]
       1
     /   \
    2     3
     \
      4

输出: "1(2()(4))(3)"

解释: 和第一个示例相似，
除了我们不能省略第一个对括号来中断输入和输出之间的一对一映射关系。

https://leetcode-cn.com/problems/construct-string-from-binary-tree/

*/

require_once '../class/TreeNode.class.php';

$arr = [1, 2, 3, 4];
$root = ListToTree::generateTree($arr);

var_dump((new Solution606())->tree2str($root));

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution606
{
    /**
     * 有四种情况：
     * 1、如果当前节点没有孩子，那我们不需要在节点后面加上任何括号；
     * 2、如果当前节点只有左孩子，那我们在递归时，只需要在左孩子的结果外加上一层括号，而不需要给右孩子加上任何括号；
     * 3、如果当前节点有两个孩子，那我们在递归时，需要在两个孩子的结果外都加上一层括号；
     * 4、如果当前节点只有右孩子，那我们在递归时，需要先加上一层空的括号 () 表示左孩子为空，再对右孩子进行递归，并在结果外加上一层括号。
     *
     * @param $root
     * @return string
     */
    function tree2str($root) {
        if (!$root) {
            return '';
        }
        // 情况1：左右子树都没有
        if ($root->left == null && $root->right == null) {
            return strval($root->val);
        }
        // 情况2：只有左子树（右子树没有）
        if ($root->right == null) {
            return strval($root->val) . '(' . $this->tree2str($root->left) . ')';
        }

        // 情况3、情况4
        return strval($root->val) . '(' . $this->tree2str($root->left) . ')(' . $this->tree2str($root->right) . ')';

    }




}
