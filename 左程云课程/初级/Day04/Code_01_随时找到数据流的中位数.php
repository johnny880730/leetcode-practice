<?php
/*
随时找到数据流的中位数
【题目】
有一个源源不断地吐出整数的数据流，假设你有足够的空间来保存吐出的数。
请设计一个名叫MedianHolder的结构，MedianHolder可以随时取得之前吐出所有数的中位数。
【要求】
1．如果MedianHolder已经保存了吐出的N个数，那么任意时刻将一个新数加入到MedianHolder的过程，其时间复杂度是O(logN)。
2．取得已经吐出的N个数整体的中位数的过程，时间复杂度为O(1)。
 */


require_once '../../../class/Tools.class.php';
$arr = Tools::initRandomArray(21, 100);
echo 'arr  = ' . join(' ', $arr) . PHP_EOL;
sort($arr);
echo 'sort = ' . join(' ', $arr) . PHP_EOL;

$obj = new Code_MedianHolder();
foreach ($arr as $num) {
    $obj->push($num);
}
echo $obj->getMedian();

/*
 * 思路：
 * 建立一个大根堆，一个小根堆。
 * 如果对数据流进行排序，排序结果的前一半在大根堆，后一半在小根堆。那么中位数就可以直接靠堆顶两个数字获得
 * 注意点：
 * 1、第一个数默认放到大根堆里
 * 2、之后每次从流中获取新数据时，如果<=大根堆的堆顶，放入大根堆；>=大根堆的堆顶就放入小根堆
 * 3、新数据放入某个堆后都需要保证两个堆中的数量差值不能大于1，如果数量差大于1，匀一个到另一个堆里即可
 */
class Code_MedianHolder
{
    private $maxHeap;
    private $minHeap;

    public function __construct()
    {
        $this->maxHeap = new SplMaxHeap();
        $this->minHeap = new SplMinHeap();
    }

    public function push($num)
    {
        // 注意点1
        if ($this->maxHeap->isEmpty()) {
            $this->maxHeap->insert($num);
            return;
        }
        // 注意点2
        if ($num <= $this->maxHeap->top()) {
            $this->maxHeap->insert($num);
        } else {
            $this->minHeap->insert($num);
        }
        // 注意点3
        if ($this->maxHeap->count() == $this->minHeap->count() + 2) {
            $this->minHeap->insert($this->maxHeap->extract());
        }
        if ($this->minHeap->count() == $this->maxHeap->count() + 2) {
            $this->maxHeap->insert($this->minHeap->extract());
        }
    }

    // 从两个堆中获取中位数
    public function getMedian()
    {
        $minSize = $this->minHeap->count();
        $maxSize = $this->maxHeap->count();

        $minHeapHead = $this->minHeap->top();
        $maxHeapHead = $this->maxHeap->top();
        if ((($minSize + $maxSize) & 1) == 0) {
            return ($minHeapHead + $maxHeapHead) / 2;
        }
        return $maxSize > $minSize ? $maxHeapHead : $minHeapHead;
    }

}