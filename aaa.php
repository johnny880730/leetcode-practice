<?php
require_once './class/TreeNode.class.php';

$arr = [5,3,6,2,4,null,8,1,null,null,null,7,9];
$root = ListToTree::generateTree($arr);

$a = increasingBST($root);
var_dump($a);

function increasingBST($root)
{
    $dummyRoot = new TreeNode(null);

    inOrder($root);
}

function inOrder($node)
{
    if ($node == null) {
        return ;
    }
    inOrder($node->left)


}
