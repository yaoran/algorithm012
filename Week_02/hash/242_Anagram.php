<?php
//给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
//
// 示例 1:
//
// 输入: s = "anagram", t = "nagaram"
//输出: true
//
//
// 示例 2:
//
// 输入: s = "rat", t = "car"
//输出: false
//
// 说明:
//你可以假设字符串只包含小写字母。
//
// 进阶:
//如果输入字符串包含 unicode 字符怎么办？你能否调整你的解法来应对这种情况？
// Related Topics 排序 哈希表


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
//    function isAnagram($s, $t) {
//        //暴力解法 1.先排序 2.比较字符串是否相等
//        $s1 = str_split($s);
//        asort($s1);
//        $s1 = implode('', $s1);
//
//        $t1 = str_split($t);
//        asort($t1);
//        $t1 = implode('', $t1);
//
//        if ($s1 === $t1) {
//            return true;
//        } else {
//            return false;
//        }
//    }
    function isAnagram($s, $t) {
        //判断每个单词出现的次数是否一样
        $ss = array_count_values(str_split($s));
        $tt = array_count_values(str_split($t));

        if (count($ss) != count($tt)) {
            return false;
        }

        return $ss == $tt ? true : false;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
