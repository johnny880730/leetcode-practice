<?php
/*
200. 岛屿数量
给你一个由 '1'（陆地）和 '0'（水）组成的的二维网格，请你计算网格中岛屿的数量。

岛屿总是被水包围，并且每座岛屿只能由水平方向和/或竖直方向上相邻的陆地连接形成。

此外，你可以假设该网格的四条边均被水包围。



示例 1：

输入：grid = [
  ["1","1","1","1","0"],
  ["1","1","0","1","0"],
  ["1","1","0","0","0"],
  ["0","0","0","0","0"]
]
输出：1
示例 2：

输入：grid = [
  ["1","1","0","0","0"],
  ["1","1","0","0","0"],
  ["0","0","1","0","0"],
  ["0","0","0","1","1"]
]
输出：3


提示：

m == grid.length
n == grid[i].length
1 <= m, n <= 300
grid[i][j] 的值为 '0' 或 '1'

https://leetcode-cn.com/problems/number-of-islands/

*/


class Solution200 {

    /**
     * 主要思路是dfs，先遍历
     * 查到的第一个陆地标记为2，开始深度搜索，查找周围的陆地，如果有就标记为2，
     * 全部标记完成以后就找到了一块陆地，下次再找到1则是第二块陆地了。
     * 使用指针，节省空间，dfs前先判断是否是陆地，节省时间。
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $num = 0;
        foreach ($grid as $y => &$row) {
            foreach ($row as $x => &$cell) {
                if ($cell == 1) {
                    $this->flipIslands($grid, $y, $x);
                    $num ++;
                }
            }
        }
        return $num;
    }

    function flipIslands(&$grid, $y, $x) {
        if (isset($grid[$y][$x]) && $grid[$y][$x] == 1) {
            $grid[$y][$x] = 2;
            if (isset($grid[$y][$x+1]) && $grid[$y][$x+1] == 1) {
                $this->flipIslands($grid, $y, $x+1);
            }
            if (isset($grid[$y][$x-1]) && $grid[$y][$x-1] == 1) {
                $this->flipIslands($grid, $y, $x-1);
            }
            if (isset($grid[$y+1][$x]) && $grid[$y+1][$x] == 1) {
                $this->flipIslands($grid, $y+1, $x);
            }
            if (isset($grid[$y-1][$x]) && $grid[$y-1][$x] == 1) {
                $this->flipIslands($grid, $y-1, $x);
            }
        }
    }
}
