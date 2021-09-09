<?php

require_once './HashMap.class.php';
require_once './HashSet.class.php';

class GraphGenerator
{
    /*
     * $matrix 为表示图的邻接矩阵
     * 每一行第一个数字为权重，第二个为出发点，第三个为到达点。例如：
     * [
     *   [7, 1, 2],
     *   [5, 1, 3],
     *   [2, 2, 3],
     * ]
     */
    public static function createGraph($matrix)
    {
        $graph = new Graph();
        for ($i = 0; $i < count($matrix); $i++) {
            $weight = $matrix[$i][0];
            $from   = $matrix[$i][1];
            $to     = $matrix[$i][2];
            // 将from点和to点加到图的节点map里
            if ($graph->nodes->containsKey($from)) {
                $graph->nodes->put($from, new Node($from));
            }
            if ($graph->nodes->containsKey($to)) {
                $graph->nodes->put($to, new Node($to));
            }
            // 根据from和to点新建Edge对象
            $fromNode = $graph->nodes->get($from);
            $toNode = $graph->node->get($to);
            $edge = new Edge($weight, $fromNode, $toNode);
            // from节点的邻居节点添加to节点，出度增加
            $fromNode->nexts[] = $toNode;
            $fromNode->out++;
            // to节点的入度增加
            $toNode->in++;
            // from节点的边数据添加刚才新建的Edge对象
            $fromNode->edges[] = $edge;
            // 图的边数据添加Edge对象
            $graph->edges->put($edge);

        }
    }
}

class Graph
{
    public $nodes;  //所有节点的集合 HashMap<Node>
    public $edges;  //所有边的集合 HashMap<Edge>

    public function __construct()
    {
        $this->nodes = new HashMap();
        $this->edges = new HashSet();
    }
}

// 图里每个节点的类
class Node
{
    public $value;      //节点的值
    public $in;         //入度，表示其他节点到当前节点的数量
    public $out;        //出度，表示当前节点到其他节点的数量
    public $nexts;      //当前节点的邻居节点 数组 Array<Node>
    public $edges;      //连接到当前节点的边 数组 Array<Edge>

    public function __construct($val)
    {
        $this->value = $val;
        $this->in    = 0;
        $this->out   = 0;
        $this->nexts = array();
        $this->edges = array();
    }
}

// 图里每条边的类
class Edge
{
    public $weight;         //边的权重
    public $from;           //出发节点 Node类型
    public $to;             //到达节点 Node类型

    public function __construct($weight, $from, $to)
    {
        $this->weight = $weight;
        $this->from   = $from;
        $this->to     = $to;
    }
}