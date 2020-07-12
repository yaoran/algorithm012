<?php
//给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i,
//ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
//
// 说明：你不能倾斜容器，且 n 的值至少为 2。
//
//
//
//
//
// 图中垂直线代表输入数组 [1,8,6,2,5,4,8,3,7]。在此情况下，容器能够容纳水（表示为蓝色部分）的最大值为 49。
//
//
//
// 示例：
//
// 输入：[1,8,6,2,5,4,8,3,7]
//输出：49
// Related Topics 数组 双指针


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        //1.两边向中间移动柱子，找到面积最大的空间
        //        $left = 0; //左边界
        //        $right = count($height) - 1; //右边界
        //        $max = 0;//最大面积
        //
        //        while ($left < $right) {
        //            $area =  $height[$left] > $height[$right] ?
        //                ($right - $left) * $height[$right--] : ($right - $left) * $height[$left++];
        //
        //            $max = max($max, $area);
        //        }

        $len = count($height);
        $max = 0;
        for ($i = 0; $j = $len - 1; $i < $j) {
            $max = max($max, min($height[$i], $height[$j]) * ($j - $i));
            if ($height[$i] < $height[$j]) {
                $i++;
            } else {
                $j--;
            }
        }
        return $max;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
