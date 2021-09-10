<?php
/*
 * 给定一个数组代表一个容器，比如[3,1,2,4]，
 * 代表0位置是一个宽度为1，高度为3的直方图。
 * 代表1位置是一个宽度为1，高度为1的直方图。
 * 代表2位置是一个宽度为1，高度为2的直方图。
 * 代表3位置是一个宽度为1，高度为4的直方图。
 * 所有直方图的底部都在一条水平线上，且紧靠着。
 * 把这个图想象成一个容器，这个容器可以装3格的水。
 * 给定一个没有负数的数组arr，返回能装几格水？
 *
 */

$arr = [3,1,2,4];
echo Code_WaterProblem::getWater1($arr) . PHP_EOL;
echo Code_WaterProblem::getWater2($arr) . PHP_EOL;
echo Code_WaterProblem::getWater3($arr) . PHP_EOL;

class Code_WaterProblem
{
    /*
    解法：每个位置i盛水的值 = min(max左侧， max右侧) - 自身高度，正值有水，负值没有水. 0和N-1是必定没有水的。
    直接遍历的复杂度O(N²)
    */
    public static function getWater1($arr) {
        $len = count($arr);
		if ($arr == null || $len < 3) {
			return 0;
		}
        $value = 0;
		for ($i = 1; $i < $len - 1; $i++) {
            $leftMax = 0;
			$rightMax = 0;
			for ($l = 0; $l < $i; $l++) {
                $leftMax = max($arr[$l], $leftMax);
            }
			for ($r = $i + 1; $r < $len; $r++) {
                $rightMax = max($arr[$r], $rightMax);
            }
			$value += max(0, min($leftMax, $rightMax) - $arr[$i]);
		}
		return $value;
	}

	/*
	 * 开两个预处理数组leftMax、rightMax。遍历arr的时候，
	 * 当前位置i的leftMax值=小于i的所有数字与arr[i]比较的更大的值 写入leftMax[i]。即leftMax[i]为0~i的最大值
	 * 当前位置i的rightMax值=大于i的所有数字与arr[i]比较的更大的值 写入rightMax[i]。即rightMax[i]为i+1~N-1的最大值
	 * 这样在循环每个位置i的时候直接从两个数组取max值计算即可。时间复杂度O(N)
	 */
	public static function getWater2($arr) {
        $len = count($arr);
        if ($arr == null || $len < 3) {
            return 0;
        }
        $n = $len - 2;

		$leftMaxs = [];
		$leftMaxs[0] = $arr[0];
		for ($i = 1; $i < $n; $i++) {
            $leftMaxs[$i] = max($leftMaxs[$i - 1], $arr[$i]);
        }
		$rightMaxs = [];
		$rightMaxs[$n - 1] = $arr[$n + 1];
		for ($i = $n - 2; $i >= 0; $i--) {
            $rightMaxs[$i] = max($rightMaxs[$i + 1], $arr[$i + 2]);
        }
		$value = 0;
		for ($i = 1; $i <= $n; $i++) {
            $value += max(0, min($leftMaxs[$i - 1], $rightMaxs[$i - 1]) - $arr[$i]);
        }
		return $value;
	}

	/*
	 * 基于getWater2方法，预处理数组也不开。利用双指针
	 * 先设置leftMax=arr[0], rightMax=arr[N-1]。
	 * 对每个位置i：
	 *  如果leftMax<=rightMax，表示瓶颈在左侧，盛水量就是leftMax-自身（负数就忽略）,同时维护leftMax；
	 *  如果leftMax>rightMax，表示瓶颈在右侧，盛水量就是rightMax-自身（负数就忽略），同时维护rightMax；
	 * 所有位置i的盛水量之和就是结果
	 */
	public static function getWater3($arr) {
        $len = count($arr);
        if ($arr == null || $len < 3) {
            return 0;
        }
        $value = 0;
		$leftMax = $arr[0];
		$rightMax = $arr[$len - 1];
		$l = 1;
		$r = $len - 2;
		while ($l <= $r) {
            if ($leftMax <= $rightMax) {
                $value += max(0, $leftMax - $arr[$l]);
                $leftMax = max($leftMax, $arr[$l++]);
            } else {
                $value += max(0, $rightMax - $arr[$r]);
                $rightMax = max($rightMax, $arr[$r--]);
            }
        }
		return $value;
	}

}