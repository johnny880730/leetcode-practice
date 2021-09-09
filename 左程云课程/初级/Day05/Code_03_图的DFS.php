<?php
/*
 * 图的深度优先遍历
 */

class Code_GraphDFS
{
    public static function dfs($node)
    {
        if ($node == null) {
            return;
        }
        $stack   = new SplStack();
        $visited = array();
        $stack->push($node);
        $visited[] = $node->val;
        echo $node->val . ' ';
        while (!$stack->isEmpty()) {
            $cur = $stack->pop();
            foreach ($node->nexts as $next) {
                if (!in_array($next->val, $visited)) {
                    $stack->push($cur);
                    $stack->push($next);
                    $visited[] = $next->val;
                    echo $next->val . ' ';
                    break;
                }
            }
        }
    }
}