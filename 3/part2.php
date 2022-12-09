<?php

$backpacks = fopen("backpacks.txt", "r") or die ("File not found");

$badgeItems = [];
$lowerCaseLetters = range("a", "z"); //used for calculating priorities using array index

$totalPriority = 0;

$elfCounter = 0; //counts to 3 to group elves

$backpackOne = "";
$backpackTwo = "";
$backpackThree = "";

while(($line = fgets($backpacks)) !== false){
    if($elfCounter === 0){
        $backpackOne = $line;
        $elfCounter++;
        continue;
    }
    if($elfCounter === 1){
        $backpackTwo = $line;
        $elfCounter++;
        continue;
    }
    if($elfCounter === 2){
        $backpackThree = $line;
        for($i = 0; $i < strlen($backpackOne); $i++) {
            if(str_contains($backpackTwo, $backpackOne[$i]) && str_contains($backpackThree, $backpackOne[$i])){
                $badgeItems[] = $backpackOne[$i];
                $elfCounter = 0;
                break;
            }
        }
    }
}

foreach($badgeItems as $letter){
    if(ctype_upper($letter)){
        $letter = strtolower($letter);
        $totalPriority += 26;
    }
    $totalPriority += array_search($letter, $lowerCaseLetters)+1;
}

echo $totalPriority;
