<?php
// 前缀树

/*
$obj = new TrieTree();
$obj->insert('abc');
$obj->insert('abd');
$obj->insert('abe');
$obj->insert('王晶捷');
$obj->insert('张慧芳');
$obj->insert('肖梦清');
$obj->insert('王慧慧');
echo $obj->search('abc') . PHP_EOL;
echo $obj->search('abd') . PHP_EOL;
echo $obj->search('abf') . PHP_EOL;
echo $obj->getPreNum('ab') . PHP_EOL;
echo $obj->getPreNum('王') . PHP_EOL;
$obj->delete('abe');
echo $obj->getPreNum('ab') . PHP_EOL;
*/

class TrieNode
{
    public $pass;   //有多少字符串经过这个节点
    public $end;    //有多少字符串以这个节点为结尾的
    public $nexts;  //指向下一个字符的数组
    public function __construct()
    {
        $this->pass = 0;
        $this->end = 0;
        $this->nexts = array();
    }
}

class TrieTree
{
    private $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    // 前缀树新增字符串
    public function insert($word)
    {
        if (!$word) {
            return;
        }
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            // 检测每个字符开启TrieNode
            $index = ord($word[$i]);
            if (!array_key_exists($index, $node->nexts) || $node->nexts[$index] == null) {
                $node->nexts[$index] = new TrieNode();
            }
            $node = $node->nexts[$index];
            $node->pass++;
        }
        $node->end++;
    }

    // 查询word出现了多少次
    public function search($word)
    {
        if (!$word) {
            return 0;
        }
        $arr = str_split($word);
        $node = $this->root;
        for ($i = 0; $i < count($arr); $i++) {
            $index = ord($arr[$i]);
            if (!array_key_exists($index, $node->nexts) || $node->nexts[$index] == null) {
                return 0;
            }
            $node = $node->nexts[$index];
        }
        return $node->end;
    }

    // 删字符串
    public function delete($word)
    {
        if ($this->search($word) > 0) {
            $arr = str_split($word);
            $node = $this->root;
            for ($i = 0; $i < count($arr); $i++) {
                $index = ord($arr[$i]);
                if (--$node->nexts[$index]->pass == 0) {
                    $node->nexts[$index] = null;
                    return;
                }
                $node = $node->nexts[$index];
            }
            $node->end--;
        }
    }

    // 查询有多少个以pre为前缀的字符串
    public function getPreNum($pre)
    {
        if (!$pre) {
            return 0;
        }
        $arr = str_split($pre);
        $node = $this->root;
        for ($i = 0; $i < count($arr); $i++) {
            $index = ord($arr[$i]);
            if (!array_key_exists($index, $node->nexts) || $node->nexts[$index] == null) {
                return 0;
            }
            $node = $node->nexts[$index];
        }
        return $node->pass;
    }
}