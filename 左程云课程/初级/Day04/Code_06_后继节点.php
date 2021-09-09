<?php
/*
在二叉树中找到一个节点的后继节点
【题目】
现在有一种新的二叉树节点类型如下：
public class Node {
    public int value;
    public Node left;
    public Node right;
    public Node parent;
    public Node(int data) {this.value = data;}
}
该结构比普通二叉树节点结构多了一个指向父节点的parent指针。
假设有一棵Node类型的节点组成的二叉树，树中每个节点的parent指针都正确地指向自己的父节点，头节点的parent指向null。
只给一个在二叉树中的某个节点node，请实现返回node的后继节点的函数。
在二叉树的中序遍历的序列中，node的下一个节点叫作node的后继节点。
 */

$head = new Node(1);
$head->parent = null;
$head->left = new Node(2);
$head->left->parent = $head;
$head->left->left = new Node(4);
$head->left->left->parent = $head->left;
$head->left->right = new Node(5);
$head->left->right->parent = $head->left;
$head->right = new Node(3);
$head->right->parent = $head;
$head->right->left = new Node(6);
$head->right->left->parent = $head->right;
$head->right->right = new Node(7);
$head->right->right->parent = $head->right;
// 中序遍历：4 2 5 1 6 3 7
$test = $head->left->left;
echo "cur = " . $test->value . ' next = '.Code_DescendantNode::getNextNode($test)->value.PHP_EOL;
$test = $head->left->right;
echo "cur = " . $test->value . ' next = '.Code_DescendantNode::getNextNode($test)->value.PHP_EOL;
$test = $head->right;
echo "cur = " . $test->value . ' next = '.Code_DescendantNode::getNextNode($test)->value.PHP_EOL;
$test = $head->right->right;
echo "cur = " . $test->value . ' next = '.Code_DescendantNode::getNextNode($test)->value.PHP_EOL;
$test = $head;
echo "cur = " . $test->value . ' next = '.Code_DescendantNode::getNextNode($test)->value.PHP_EOL;

class Node
{
    public $value;
    public $left;
    public $right;
    public $parent;

    public function __construct($data)
    {
        $this->value = $data;
    }
}

/*
 *        1
 *      2    3
 *    4  5  6  7
 * 中序遍历：4 2 5 1 6 3 7
 * 对当前节点X，
 * 1、如果X有右子树：根据中序遍历的特点，X的后继节点就是右子树上最左的节点（例如2的后继=5，1的后继=6，3的后继=7）
 * 2、如果X没有右子树：
 * 2-1、若X是parent的左孩子的话，那么X的后继节点就是X的parent（例如4的后继2，6的后继3 ）
 * 2-2、若X是parent的右孩子的话，需要沿着parent一路往上找，找到某个节点p是节点q的左孩子，那么这个q就是后继（例如5的后继=1），没找到就没有后继节点
 */
class Code_DescendantNode
{
    public static function getNextNode($node)
    {
        if ($node == null) {
            return $node;
        }
        if ($node->right != null) {
            // 当前节点有右子树的情况
            return self::getMostLeft($node->right);
        } else {
            // 当前节点没有右子树的情况
            $parent = $node->parent;
			while ($parent != null && $parent->left != $node) {
                $node = $parent;
                $parent = $node->parent;
            }
			return $parent;
        }
    }

    public static function getMostLeft($node)
    {
        if ($node == null) {
            return $node;
        }
        while ($node->left != null) {
            $node = $node->left;
        }
        return $node;
    }
}