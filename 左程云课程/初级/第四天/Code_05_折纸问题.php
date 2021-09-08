<?php
/*
折纸问题
【题目】
请把一段纸条竖着放在桌子上，然后从纸条的下边向上方对折1次，压出折痕后展开。
此时折痕是凹下去的，即折痕突起的方向指向纸条的背面。
如果从纸条的下边向上方连续对折2次，压出折痕后展开，
此时有三条折痕，从上到下依次是下折痕、下折痕和上折痕。
给定一个输入参数N，代表纸条都从下边向上方连续对折N次，请从上到下打印所有折痕的方向。
例如：N=1时，打印：down
N=2时，打印：down down up
 */

$num = 1;

/*
 * 思路：
 * 第一次：只有一个down折痕
 * 第二次：在第一个down折痕的上面有一个down折痕，下面有一个up折痕
 * 如果折第三次，会发现在第二次生成的两条折痕的上面有一个down折痕，下面有一个下折痕
 * 因此可以用一个二叉树模拟
 * 1.             D
 * 2.          D      U
 * 3.        D   U  D   U
 * 将折纸从上到下的顺序打印的结果就是 D D U D D U U => 对应这棵树的中序遍历
 * 这棵二叉树就是：root为D，左子树为D，右子树为U
 */

Code_PaperFolding::printFolding(3);

class Code_PaperFolding
{
    public static function printFolding($num)
    {
        self::printProcess(1, $num, true);
    }

    /**
     * @param $i      int  当前在第几层，也就是第几次折
     * @param $n      int  一共要折多少次
     * @param $isDown bool 节点是否为down折痕
     */
    public static function printProcess($i, $n, $isDown)
    {
        if ($i > $n) {
            return;
        }
        self::printProcess($i + 1, $n, true);
        echo $isDown ? 'down ' : 'up ';
        self::printProcess($i + 1, $n, false);
    }
}