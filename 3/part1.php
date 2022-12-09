<?php

$backpacks = fopen("backpacks.txt", "r") or die ("File not found");

$duplicateItems = [];
$lowerCaseLetters = range("a", "z");
$upperCaseLetters = range("A", "Z");

$totalPriority = 0;

while(($line = fgets($backpacks)) !== false){
    //split backpack string in 2 equal parts
    $compartmentOne = substr($line, 0, (strlen($line)/2));
    $compartmentTwo = substr($line, strlen($line)/2);

    //find duplicate letter in first and second half of string
    for($i = 0; $i < strlen($compartmentOne); $i++) {
        if (str_contains($compartmentTwo, $compartmentOne[$i])) {
            $duplicateItems[] = $compartmentOne[$i];
            break;
        }
    }
}

foreach($duplicateItems as $letter){
    if(ctype_lower($letter)){
        $totalPriority += array_search($letter, $lowerCaseLetters)+1;
    }

    if(ctype_upper($letter)){
        $totalPriority += array_search($letter, $upperCaseLetters)+27;
    }
}

echo $totalPriority;
