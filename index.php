<?php

//User Provides Plateau Size
echo "Provide Plateau Data";
echo "\n";
$handle = fopen("php://stdin", "r");
$xy = fgets($handle);
$plateauxy = explode(" ", $xy);
$plateaux = (int)trim($plateauxy[0]);
$plateauy = (int)trim($plateauxy[1]);

$a = true;
$i = 1;
while ($a == true) {
    if ($i == 1) {
        roverData($i, $plateaux, $plateauy);
        $i +=1;
    } else {
        echo "Is there more Rovers?";
        echo "\n";
        $handle = fopen("php://stdin", "r");
        $moreRovers = trim(fgets($handle));
        if (strtoupper($moreRovers) == "YES") {
            roverData($i, $plateaux, $plateauy);
            $i +=1;
        } else {
            $a = false;
        }
    }
    
}

// Rover Take Data Function
function roverData($i, $plateaux, $plateauy){
    //User gives Rover position
    echo "Provide Rover " . $i . " Data";
    echo "\n";
    $handle = fopen("php://stdin", "r");
    $Rover = fgets($handle);
    $Roverp = explode(" ", $Rover);
    $Roverx = (int)trim($Roverp[0]);
    $Rovery = (int)trim($Roverp[1]);
    $Roverp = (string)trim($Roverp[2]);
    roverMovement($Roverx, $Rovery, $Roverp, $i, $plateaux, $plateauy);
}

// Rover Take Movement Function
function roverMovement($Roverx, $Rovery, $Roverp, $i, $plateaux, $plateauy){
    //User gives Rover movement instructions
    echo "Provide Rover " . $i . " Movement";
    echo "\n";
    $handle = fopen("php://stdin", "r");
    $RoverMovement = fgets($handle);
    $Roverm = str_split(trim($RoverMovement));
    echo "\n";
    echo moveRover($Roverm, $Roverx, $Rovery, $Roverp, $i, $plateaux, $plateauy);
    echo "\n";
}

// Rover Movement Function

function moveRover($RoverMovement, $Roverx, $Rovery, $Roverp, $i, $plateaux, $plateauy){
    $RoverStartingP = $Roverp;
    $RoverStartingX = $Roverx;
    $RoverStartingY = $Rovery;
    foreach ($RoverMovement as $key => $value) {
        if ($Roverp == "N") {
            if ($value == "L"){
                $Roverp = "W";
            } else if ($value == "R"){
                $Roverp = "E";
            } else {
                $Rovery +=1;
            }
        } else if($Roverp == "E") {
            if ($value == "L"){
                $Roverp = "N";
            } else if ($value == "R"){
                $Roverp = "S";
            } else {
                $Roverx +=1;
            }
        } else if($Roverp == "S") {
            if ($value == "L"){
                $Roverp = "E";
            } else if ($value == "R"){
                $Roverp = "W";
            } else {
                $Rovery -=1;
            }
        } else {
            if ($value == "L"){
                $Roverp = "S";
            } else if ($value == "R"){
                $Roverp = "N";
            } else {
                $Roverx -=1;
            }
        }
    }

    if ($Roverx>=0 && $Roverx<= $plateaux && $Rovery>=0 && $Rovery<= $plateauy) {
        $result = $Roverx . " " . $Rovery . " " . $Roverp;
        return $result;
    } else {
        echo "Rover goes outside the plateau. Please give correct Rover movement data";
        roverMovement($RoverStartingX, $RoverStartingY, $RoverStartingP, $i, $plateaux, $plateauy);
    }
}