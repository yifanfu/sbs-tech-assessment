<?php


namespace App\PhpQuestions;


/**
 * Class WaterVolume
 * @package App\PhpQuestions
 */
class WaterVolume
{
    /**
     * @param $givenArray
     * @return int|mixed
     */
    public function calculate($givenArray)
    {
        $leftPointer = 0;
        $rightPoint = count($givenArray) - 1;
        $water = 0;
        $leftMax = 0;
        $rightMax = 0;

        while($leftPointer < $rightPoint) {
            if ($givenArray[$leftPointer] < $givenArray[$rightPoint]) {
                $leftMax = max($givenArray[$leftPointer], $leftMax);
                $water += $leftMax - $givenArray[$leftPointer];
                $leftPointer++;
            } else {
                $rightMax = max($givenArray[$rightPoint], $rightMax);
                $water += $rightMax - $givenArray[$rightPoint];
                $rightPoint--;
            }
        }

        return $water;
    }
}