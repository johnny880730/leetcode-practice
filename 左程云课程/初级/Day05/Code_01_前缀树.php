<?php
/*
 * 前缀树（假设字符串都由小写的26个字母组成）
 */

$word = 'abc';
$obj = new TrieTree();
$obj->insert('abc');
$obj->insert('abd');
$obj->insert('abe');
echo $obj->search('abc') . PHP_EOL;
echo $obj->search('abd') . PHP_EOL;
echo $obj->search('abf') . PHP_EOL;
echo $obj->getPreNum('ab') . PHP_EOL;

class TrieNode
{
    public $pass;   //有多少字符串经过这个节点
    public $end;    //有多少字符串以这个节点为结尾的
    public $nexts;  //指向下一个字符的数组
    public function __construct()
    {
        $this->pass = 0;
        $this->end = 0;
        // 英文字符可以直接开26的数组，若有中文的话直接开哈希表
        $this->nexts = array_fill(0, 26, null);
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
        $arr = str_split($word);
        $node = $this->root;
        for ($i = 0; $i < count($arr); $i++) {
            // 检测每个字符开启TrieNode
            $index = ord($arr[$i]) - ord('a');
            if ($node->nexts[$index] == null) {
                $node->nexts[$index] = new TrieNode();
            }
            $node = $node->nexts[$index];
            $node->pass++;
        }
        $node->end++;
    }

    // 查询word有多少次
    public function search($word)
    {
        if (!$word) {
            return 0;
        }
        $arr = str_split($word);
        $node = $this->root;
        for ($i = 0; $i < count($arr); $i++) {
            $index = ord($arr[$i]) - ord('a');
            if ($node->nexts[$index] == null) {
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
                $index = ord($arr[$i]) - ord('a');
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
            $index = ord($arr[$i]) - ord('a');
            if ($node->nexts[$index] == null) {
                return 0;
            }
            $node = $node->nexts[$index];
        }
        return $node->pass;
    }
}
