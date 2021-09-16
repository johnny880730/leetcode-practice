<?php
/*
 * 二叉树的Morris遍历
 * 规则：
 * 1、如果cur无左孩子，cur向右移动（cur=cur.right）
 * 2、如果cur有左孩子，找到cur左子树上最右的节点，记为mostright
 *      如果mostright的right指针指向空，让其指向cur，cur向左移动（cur=cur.left）
 *      如果mostright的right指针指向cur，让其指向空，cur向右移动（cur=cur.right）
 *
 *            1
 *          /   \
 *         2     3
 *        / \   / \
 *       4  5  6   7
 */

require_once '../../../class/TreeNode.class.php';

$arr = [1,2,3,4,5,6,7];
$head = ListToTree::generateTree($arr);
echo 'Morris: ';
Code_MorrisTraversal::morris($head);
echo 'Pre:    ';
Code_MorrisTraversal::morrisPre($head);
echo 'In:     ';
Code_MorrisTraversal::morrisIn($head);
echo 'Post:   ';
Code_MorrisTraversal::morrisPost($head);


class Code_MorrisTraversal
{
    // Morris遍历
    public static function morris($head)
    {
        if ($head == null) {
            return;
        }
        # cur表示当前节点，mostRight表示cur的左孩子的最右节点
        $cur = $head;
		while ($cur != null) {
		     echo $cur->val . ' ';   //morris遍历的打印点
            $mostRight = $cur->left;
            if ($mostRight != null) {
                # cur有左孩子，找到cur左子树最右节点
                while ($mostRight->right != null && $mostRight->right != $cur) {
                    $mostRight = $mostRight->right;
                }
                if ($mostRight->right == null) {
                    # 如果mostRight的右孩子指向空，让其指向cur，cur向左移动
                    $mostRight->right = $cur;
                    $cur = $cur->left;
                    continue;
                } else {
                    # 如果mostRight的右孩子指向cur，让其指向空，cur向右移动
                    $mostRight->right = null;
                }
            }
			$cur = $cur->right;
		}
		echo PHP_EOL;
	}

	// Morris实现前序遍历
    public static function morrisPre($head)
    {
        if ($head == null) {
            return;
        }
        $cur = $head;
        while ($cur != null) {
            $mostRight = $cur->left;
            if ($mostRight != null) {
                while ($mostRight->right != null && $mostRight->right != $cur) {
                    $mostRight = $mostRight->right;
                }
                if ($mostRight->right == null) {
                    $mostRight->right = $cur;
                    echo $cur->val .' ';    // 前序遍历的打印点1
                    $cur = $cur->left;
                    continue;
                } else {
                    $mostRight->right = null;
                }
            } else {
                echo $cur->val .' ';    // 前序遍历的打印点2
            }
            $cur = $cur->right;
        }
        echo PHP_EOL;
    }

    // Morris实现中序遍历
    public static function morrisIn($head)
    {
        if ($head == null) {
            return;
        }
        $cur = $head;
        while ($cur != null) {
            $mostRight = $cur->left;
            if ($mostRight != null) {
                while ($mostRight->right != null && $mostRight->right != $cur) {
                    $mostRight = $mostRight->right;
                }
                if ($mostRight->right == null) {
                    $mostRight->right = $cur;
                    $cur = $cur->left;
                    continue;
                } else {
                    $mostRight->right = null;
                }
            }
            echo $cur->val .' ';    // 中序遍历的打印点
            $cur = $cur->right;
        }
        echo PHP_EOL;
    }

    public static function morrisPost($head)
    {
        if ($head == null) {
            return;
        }
        $cur = $head;
        while ($cur != null) {
            $mostRight = $cur->left;
            if ($mostRight != null) {
                while ($mostRight->right != null && $mostRight->right != $cur) {
                    $mostRight = $mostRight->right;
                }
                if ($mostRight->right == null) {
                    $mostRight->right = $cur;
                    $cur = $cur->left;
                    continue;
                } else {
                    $mostRight->right = null;
                    self::printEdge($cur->left);
                }
            }
            $cur = $cur->right;
        }
        self::printEdge($head);
        echo PHP_EOL;
    }

    public static function printEdge($head) {
		$tail = self::reverseEdge($head);
		$cur = $tail;
		while ($cur != null) {
			echo $cur->val . ' ';
			$cur = $cur->right;
		}
        self::reverseEdge($tail);
    }

    public static function reverseEdge($from)
    {
        $pre = null;
        $next = null;
        while ($from != null) {
            $next = $from->right;
            $from->right = $pre;
            $pre = $from;
            $from = $next;
        }
        return $pre;
    }

}