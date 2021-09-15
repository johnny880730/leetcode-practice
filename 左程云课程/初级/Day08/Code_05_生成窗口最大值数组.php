<?php
/*
 * 生成窗口最大值数组
 * 【题目】
 * 有一个整型数组arr和一个大小为w的窗口从数组的最左边滑到最右边，窗口每次向右边滑一个位置。
 * 例如，数组为[4,3,5,4,3,3,6,7]，窗口大小为3时：
 * [4 3 5] 4 3 3 6 7 窗口中最大值为5
 * 4 [3 5 4] 3 3 6 7 窗口中最大值为5
 * 4 3 [5 4 3] 3 6 7 窗口中最大值为5
 * 4 3 5 [4 3 3] 6 7 窗口中最大值为4
 * 4 3 5 4 [3 3 6] 7 窗口中最大值为6
 * 4 3 5 4 3 [3 6 7] 窗口中最大值为7
 * 如果数组长度为n，窗口大小为w，则一共产生n-w+1个窗口的最大值。
 * 请实现一个函数。输入：整型数组arr，窗口大小为w。
 * 输出：一个长度为n-w+1的数组res，res[i]表示每一种窗口状态下的最大值。以本题为例，结果应该返回{5,5,5,4,6,7}。
 */

require_once '../../../class/DoubleEndedQueue.class.php';

$obj = new Code_04_SlidingWindow();
print_r($obj->getMaxArr([4,3,5,4,3,3,6,7], 3));

class Code_04_SlidingWindow
{
    /*
     * 利用<双端队列>维护滑动窗口最大值：
     * 1、双端队列里，逻辑上始终保持 从头到尾 是 由大到小的数字顺序（等于也不行），实际上放入队列的是下标 i
     * 2、数字进入窗口的情况：如果小于队尾的数字，就放在队尾；其他情况就从队列淘汰队尾的数字（包含等于的情况）
     * 3、数字离开窗口的情况：队首的元素与循环的i的下标相同的话才将该元素从队首淘汰
     * 4、这样每个窗口的最大值就是队首的元素
     */
    public function getMaxArr($arr, $k)
    {
        $queue = new DoubleEndedQueue();
        $res = [];
        for ($i = 0, $len = count($arr); $i < $len; $i++) {
            while (!$queue->isEmpty() && $arr[$queue->getLast()] <= $arr[$i]) {
                $queue->removeLast();
            }
            $queue->addLast($i);
            if ($queue->getFirst() == $i - $k) {
                $queue->removeFirst();
            }
            if ($i >= $k - 1) {
                $res[] = $arr[$queue->getFirst()];
            }
        }
        return $res;
    }


}