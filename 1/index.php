<?php

$elfFile = fopen("elves.txt", "r") or die ("File not found");

$highestCalorieCount = 0;
$secondHighestCalorieCount = 0;
$thirdHighestCalorieCount = 0;

$currentCalorieCount = 0;

while(($line = fgets($elfFile)) !== false) {
    if(empty(trim($line))){
        if($currentCalorieCount >= $highestCalorieCount){
            $thirdHighestCalorieCount = $secondHighestCalorieCount;
            $secondHighestCalorieCount = $highestCalorieCount;
            $highestCalorieCount = $currentCalorieCount;
        }elseif($currentCalorieCount >= $secondHighestCalorieCount){
            $thirdHighestCalorieCount = $secondHighestCalorieCount;
            $secondHighestCalorieCount = $currentCalorieCount;
        }elseif($currentCalorieCount >= $thirdHighestCalorieCount){
            $thirdHighestCalorieCount = $currentCalorieCount;
        }

        $currentCalorieCount = 0;
        continue;
    }
    $currentCalorieCount += (int)$line;
}

echo $highestCalorieCount + $secondHighestCalorieCount + $thirdHighestCalorieCount;

