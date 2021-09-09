<?php
/*
输入：
参数1，正数数组costs，costs[i]表示i号项目的花费
参数2，正数数组profits，profits[i]表示i号项目在扣除花费之后还能挣到的钱(利润)
参数3，正数k，k表示你不能并行、只能串行的最多做k个项目
参数4，正数m，m表示你当前拥有的资金
说明：你每做完一个项目，马上获得的收益，可以支持你去做下一个项目。
输出：你最后获得的最大钱数。
 */


/*
贪心：
所有小于当前资金的项目中取收益最大的
1、所有项目根据cost建立小根堆
2、所有项目根据profit建立大根堆
3、小根堆的顶只要<=当前资金，弹出进入大根堆，直到小根堆的堆顶大于启动资金才停止弹出（表示项目成本大于启动资金）
4、选择大根堆的堆顶项目去做项目，启动资金也因此增加（最多做K个)
 */

$cost = [1,2,3,4];
$profit = [10,20,30,40];
$k = 1;
$m = 1;

$obj = new Code_ProjectMaxProfit($cost, $profit, $k, $m);
echo $obj->getMaxProfit();

class Code_ProjectMaxProfit
{
    protected $costMinHeap;
    protected $profitMaxHeap;
    protected $k;
    protected $m;

    /**
     * Code_ProjectMaxProfit constructor.
     * @param $cost     array   成本数组
     * @param $profit   array   收益数组
     * @param $k        int     项目最大数量
     * @param $m        int     启动资金
     */
    public function __construct($cost, $profit, $k, $m)
    {
        $this->costMinHeap = new SplMinHeap();
        $this->profitMaxHeap = new SplMaxHeap();
        $this->k = $k;
        $this->m = $m;

        //cost建立的小根堆
        foreach ($cost as $num) {
            $this->costMinHeap->insert($num);
        }
        //profit建立的大根堆
        foreach ($profit as $num) {
            $this->profitMaxHeap->insert($num);
        }
    }

    public function getMaxProfit()
    {
        for ($i = 0; $i < $this->k; $i++) {
            // 从cost小根堆中取最小的cost，放入profit大根堆
            while (!$this->costMinHeap->isEmpty() && $this->costMinHeap->top() <= $this->m) {
                $this->profitMaxHeap->insert($this->costMinHeap->extract());
            }
            if ($this->profitMaxHeap->isEmpty()) {
                return $this->m;
            }
            $this->m += $this->profitMaxHeap->extract();
        }
        return $this->m;
    }

}