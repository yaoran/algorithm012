<?php
//给你一个由 '1'（陆地）和 '0'（水）组成的的二维网格，请你计算网格中岛屿的数量。
//
// 岛屿总是被水包围，并且每座岛屿只能由水平方向或竖直方向上相邻的陆地连接形成。
//
// 此外，你可以假设该网格的四条边均被水包围。
//
//
//
// 示例 1:
//
// 输入:
//[
//['1','1','1','1','0'],
//['1','1','0','1','0'],
//['1','1','0','0','0'],
//['0','0','0','0','0']
//]
//输出: 1
//
//
// 示例 2:
//
// 输入:
//[
//['1','1','0','0','0'],
//['1','1','0','0','0'],
//['0','0','1','0','0'],
//['0','0','0','1','1']
//]
//输出: 3
//解释: 每座岛屿只能由水平和/或竖直方向上相邻的陆地连接而成。
//
// Related Topics 深度优先搜索 广度优先搜索 并查集
// 👍 687 👎 0


class Solution
{
    private $dx = [-1, 1, 0, 0];
    private $dy = [0, 0, -1, 1];

    private $g = [];

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $isLands = 0;
        $this->g = $grid;
        $m = count($this->g);
        $n = count($this->g[0]);
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if (!$this->g[$i][$j]) {
                    continue;
                }

                $isLands += $this->sink($i, $j);
            }
        }

        return $isLands;
    }

    function sink($i, $j)
    {
        if (!$this->g[$i][$j]) {
            return 0;
        }

        $this->g[$i][$j] = '0';
        $m = count($this->g);
        $n = count($this->g[0]);

        $dcount = count($this->dx);

        // 把上下左右都沉底。四联通
        for ($k = 0; $k < $dcount; $k++) {
            $x = $i + $this->dx[$k];
            $y = $j + $this->dy[$k];

            if ($x >= 0 && $x < $m && $y >= 0 && $y < $n) {

                if (!$this->g[$x][$y]) {
                    continue;
                }

                $this->sink($x, $y);
            }
        }

        return 1;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
