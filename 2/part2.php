<?php

$strategyGuide = fopen("strategyguide.txt", "r") or die ("File not found");
$totalScore = 0;

while(($line = fgets($strategyGuide)) !== false){
    $playerOneMove = $line[0];
    $expectedOutcome = $line[2];
    $totalScore += calcOutcome($expectedOutcome, $playerOneMove);
}

echo $totalScore;

function calcOutcome($expectedOutcome, $playerOneMove): int {
    $score = 0;
    switch ($expectedOutcome) {
        //Loss
        case "X":
            if($playerOneMove === "A"){
                $score += 3;
            } elseif ($playerOneMove === "B"){
                $score += 1;
            } elseif ($playerOneMove === "C"){
                $score += 2;
            }
            break;

        case "Y":
            $score += 3;
            if($playerOneMove === "A"){
                $score += 1;
            } elseif ($playerOneMove === "B"){
                $score += 2;
            } elseif ($playerOneMove === "C"){
                $score += 3;
            }
            break;

        case "Z":
            $score += 6;
            if($playerOneMove === "A"){
                $score += 2;
            } elseif ($playerOneMove === "B"){
                $score += 3;
            } elseif ($playerOneMove === "C"){
                $score += 1;
            }
            break;
    }
    return $score;
}

