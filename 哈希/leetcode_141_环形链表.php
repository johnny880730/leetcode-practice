<?php
/*
141. 环形链表
给定一个链表，判断链表中是否有环。

如果链表中有某个节点，可以通过连续跟踪 next 指针再次到达，则链表中存在环。 为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。 如果 pos 是 -1，则在该链表中没有环。注意：pos 不作为参数进行传递，仅仅是为了标识链表的实际情况。

如果链表中存在环，则返回 true 。 否则，返回 false 。

进阶：
你能用 O(1)（即，常量）内存解决此问题吗？

示例 1：
输入：head = [3,2,0,-4], pos = 1
输出：true
解释：链表中有一个环，其尾部连接到第二个节点。

https://leetcode-cn.com/problems/linked-list-cycle/

*/

class Solution141
{

    /**
     * 哈希
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head)
    {
        $arr = [];
        while ($head) {
            if ($head->next == null) {
                return false;
            }
            if (isset($arr[$head->next->val]) && $head->next === $arr[$head->next->val]) {
                return true;
            }
            $arr[$head->val] = $head;

            $head = $head->next;
        }
        return false;
    }
}
