<?php

class Tools
{
    /**
     * 生成随机数组
     * @param int $maxLen       数组长度
     * @param int $maxValue     数组最大值
     * @return array
     */
    public static function initRandomArray($maxLen = 100, $maxValue = 100)
    {
        $res = [];
        for ($i = 0; $i < $maxLen; $i++) {
            $res[] = rand(0, $maxValue);
        }
        return $res;
    }
}