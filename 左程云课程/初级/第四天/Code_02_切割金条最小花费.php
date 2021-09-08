<?php
/*
一块金条切成两半，是需要花费和长度数值一样的铜板的。
比如长度为20的金条，不管切成长度多大的两半，都要花费20个铜板。
一群人想整分整块金条，怎么分最省铜板？
例如,给定数组{10,20,30}，代表一共三个人
整块金条长度为10+20+30=60. 金条要分成10,20,30三个部分。
如果，先把长度60的金条分成10和50，花费60再把长度50的金条分成20和30，花费50一共花费110铜板。
但是如果，先把长度60的金条分成30和30，花费60再把长度30金条分成10和20，花费30一共花费90铜板。
输入一个数组，返回分割的最小代价。
 */


/*
看作是二叉树的题目。例如[10,20,30]
     60                 60
    /  \               /  \
   50  10            30    30
  /  \              / \
 20   30           10  20
如上面两个二叉树，题目数组的[10,20,30]表示每人最后获得的量也就是叶子节点。
题目就转化为：
求非叶子节点的和的最小值

利用小根堆：
1、数组建立小根堆
2、每次拿两个最小的值合并成一个值，再扔回小根堆
3、沿途的代价依次累加就是结果
 */

$arr = [10, 20, 30];
$obj = new Code_MinCostCutGold($arr);
echo $obj->getMinCost();

class Code_MinCostCutGold
{
    protected $minHeap;


    public function __construct($arr)
    {
        // 建立小根堆
        $this->minHeap = new SplMinHeap();
        foreach ($arr as $num) {
            $this->minHeap->insert($num);
        }
    }

    public function getMinCost()
    {
        $res = 0;
        while ($this->minHeap->count() > 1) {
            $tmp = $this->minHeap->extract() + $this->minHeap->extract();
            $res += $tmp;
            $this->minHeap->insert($tmp);
        }
        return $res;
    }


}