<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *,*::after,*::before{
    margin: 0;
    padding: 0;
    box-sizing: inherit;
}

body{
    box-sizing: border-box;
    width: 100vw;
    height: 100vh;
    font-size: 18px;
    overflow: hidden;
}

.wrapper{
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
}

.form-box{
    display: flex;
    flex-direction: column;
    margin: 10px;
}

.result{
    text-align: center;
}

.btn{
    height: 40px;
}
</style>
    <title>Assignment for Insurance Market</title>
</head>
<body>
    <div class="wrapper">
        <h2>Test Input:</h2>
        <form action="" method="post">
            <div class="form-box">
                <label for="xy">Δώστε το μήκος και πλάτος της πλατφόρμας</label>
                <input id="xy" name="xy" type="number">
            </div>
            <div class="form-box">
                <label for="rover1">Δώστε την θέση του πρώτου rover</label>
                <input id="rover1" name="rover1" type="text">
            </div>
            <div class="form-box">
                <label for="rover1-movement">Δώστε την κίνηση του πρώτου rover</label>
                <input id="rover1-movement" name="rover1-movement" type="text">
            </div>
            <div class="form-box">
                <label for="rover2">Δώστε την θέση του δεύτερου rover</label>
                <input id="rover2" name="rover2" type="text">
            </div>
            <div class="form-box">
                <label for="rover2-movement">Δώστε την κίνηση του δεύτερου rover</label>
                <input id="rover2-movement" name="rover2-movement" type="text">
            </div>
            <div class="form-box">
                <button type="submit">Submit</button>
            </div>
        </form>
        <div class="result">
        <h2>Test output:</h2>
        <?php

$xy = $_POST["xy"];

$xy_arr = str_split($xy);

$x = $xy_arr[0];

$y = $xy_arr[1];

$rover1_possition = $_POST["rover1"];

$rover1_possition_arr = str_split($rover1_possition);

$rover1_x = (int)$rover1_possition_arr[0];

$rover1_y = (int)$rover1_possition_arr[1];

$rover1_face = $rover1_possition_arr[2];

$rover2_possition = $_POST["rover2"];

$rover2_possition_arr = str_split($rover2_possition);

$rover2_x = (int)$rover2_possition_arr[0];

$rover2_y = (int)$rover2_possition_arr[1];

$rover2_face = $rover2_possition_arr[2];

$rover1_movement = $_POST["rover1-movement"];

$rover1_movement_arr = str_split($rover1_movement);

$rover2_movement = $_POST["rover2-movement"];

$rover2_movement_arr = str_split($rover2_movement);


foreach ($rover1_movement_arr as $key => $value) {
    if ($rover1_face == "N") {
        if ($value == "L"){
            $rover1_face = "W";
        } else if ($value == "R"){
            $rover1_face = "E";
        } else {
            $rover1_y +=1;
        }
    } else if ($rover1_face == "E") {
        if ($value == "L"){
            $rover1_face = "N";
        } else if ($value == "R"){
            $rover1_face = "S";
        } else {
            $rover1_x +=1;
        }
    } else if ($rover1_face == "S") {
        if ($value == "L"){
            $rover1_face = "E";
        } else if ($value == "R"){
            $rover1_face = "W";
        } else {
            $rover1_y -=1;
        }
    } else if ($rover1_face == "W") {
        if ($value == "L"){
            $rover1_face = "S";
        } else if ($value == "R"){
            $rover1_face = "N";
        } else {
            $rover1_x -=1;
        }
    }
}

foreach ($rover2_movement_arr as $key => $value) {
    if ($rover2_face == "N") {
        if ($value == "L"){
            $rover2_face = "W";
        } else if ($value == "R"){
            $rover2_face = "E";
        } else {
            $rover2_y +=1;
        }
    } else if ($rover2_face == "E") {
        if ($value == "L"){
            $rover2_face = "N";
        } else if ($value == "R"){
            $rover2_face = "S";
        } else {
            $rover2_x +=1;
        }
    } else if ($rover2_face == "S") {
        if ($value == "L"){
            $rover2_face = "E";
        } else if ($value == "R"){
            $rover2_face = "W";
        } else {
            $rover2_y -=1;
        }
    } else if ($rover2_face == "W") {
        if ($value == "L"){
            $rover2_face = "S";
        } else if ($value == "R"){
            $rover2_face = "N";
        } else {
            $rover2_x -=1;
        }
    }
}

if ($rover1_x <= (int)$x && $rover1_x >= 0 && $rover1_y < (int)$y && $rover1_y >= 0) {
    echo $rover1_x . " " . $rover1_y . " " . $rover1_face;
    echo "<br>";
} else {
    echo "Οι συντεταγμένες που δώσατε οδηγούν το πρώτο Rover εκτός πλατφόρμας";
    echo "<br>";
    echo "Παρακαλώ ξανά δώστε ορθές συντεταγμένες κίνησης ή ορίων πλατφόρμας";
}

if ($rover2_x <= (int)$x && $rover2_x >= 0 && $rover2_y < (int)$y && $rover2_y >= 0) {
    echo $rover2_x . " " . $rover2_y . " " . $rover2_face;
    echo "<br>";
} else {
    echo "Οι συντεταγμένες που δώσατε οδηγούν το δεύτερο Rover εκτός πλατφόρμας";
    echo "<br>";
    echo "Παρακαλώ ξανά δώστε ορθές συντεταγμένες κίνησης ή ορίων πλατφόρμας";
}


?>
        </div>
    </div>
</body>
</html>