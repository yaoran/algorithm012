<?php
//给定一个二叉树，返回它的中序 遍历。
//
// 示例:
//
// 输入: [1,null,2,3]
//   1
//    \
//     2
//    /
//   3
//
//输出: [1,3,2]
//
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树 哈希表
// 👍 584 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
/**
* Definition for a binary tree node.
* class TreeNode {
*     public $val = null;
*     public $left = null;
*     public $right = null;
*     function __construct($value) { $this->val = $value; }
* }
*/
class Solution {

    /**
    * @param TreeNode $root
    * @return Integer[]
    */
    function inorderTraversal($root) {
        $stack = [];
        $res = [];
        $curr = $root;
        while($curr != null || !empty($stack)) {
            while($curr != null) {
            array_push($stack, $curr);
            $curr = $curr->left;
        }
        $curr = array_pop($stack);
        $res[] = $curr->val;
        $curr = $curr->right;
        }
        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
