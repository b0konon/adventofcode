<?php

$strategyGuide = fopen("strategyguide.txt", "r") or die ("File not found");
$totalScore = 0;

while(($line = fgets($strategyGuide)) !== false){
    $playerOneMove = $line[0];
    $playerTwoMove = $line[2];
    $totalScore += calcOutcome($playerOneMove, $playerTwoMove);
}

echo $totalScore;

function calcOutcome($playerOneMove, $playerTwoMove): int {
    $score = 0;
    switch ($playerTwoMove) {
        case "X":
            $score += 1;
            if($playerOneMove === "A"){
                $score += 3;
            } elseif ($playerOneMove === "B"){
                $score += 0;
            } elseif ($playerOneMove === "C"){
                $score += 6;
            }
            break;

        case "Y":
            $score += 2;
            if($playerOneMove === "A"){
                $score += 6;
            } elseif ($playerOneMove === "B"){
                $score += 3;
            } elseif ($playerOneMove === "C"){
                $score += 0;
            }
            break;

        case "Z":
            $score +=3;
            if($playerOneMove === "A"){
                $score += 0;
            } elseif ($playerOneMove === "B"){
                $score += 6;
            } elseif ($playerOneMove === "C"){
                $score += 3;
            }
            break;
    }
    return $score;
}
