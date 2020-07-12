<?php
//给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
//
//
//
// 上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。 感谢 Mar
//cos 贡献此图。
//
// 示例:
//
// 输入: [0,1,0,2,1,0,1,3,2,1,2,1]
//输出: 6
// Related Topics 栈 数组 双指针


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
    * @param Integer[] $height
    * @return Integer
    */
    function trap($height) {
        $count = count($height);
        if ($count <= 2) {
            return 0;
        }

        $result = 0;
        $maxLeft = $maxRight = array_fill(0, $count, 0);
        // 从左向右计算左侧最高
        for ($i = 1; $i < $count; ++$i) {
            $maxLeft[$i] = max($maxLeft[$i - 1], $height[$i - 1]);
        }

        // 从右向左计算右侧最高
        for ($i = $count - 1; $i > 0; --$i) {
            $maxRight[$i] = max($maxRight[$i + 1], $height[$i + 1]);
        }

        for ($i = 1; $i < $count - 1; ++$i) {
            $diff = min($maxLeft[$i], $maxRight[$i]) - $height[$i];
            if ($diff > 0) {
                $result += $diff;
            }
        }

        return $result;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
