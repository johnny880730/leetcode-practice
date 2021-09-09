<?php
/*
 * 图的广度优先遍历
 */

class Code_GraphBFS
{
    public static function bfs($node)
    {
        if ($node == null) {
            return;
        }
        $queue   = new SplQueue();
        $visited = array();
        $queue->enqueue($node);
        $visited[] = $node->val;
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            echo $node->val . ' ';
            foreach ($node->nexts as $next) {
                if (!in_array($next->val, $visited)) {
                    $visited[] = $next->val;
                    $queue->enqueue($next);
                }
            }
        }
    }
}