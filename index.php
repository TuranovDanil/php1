<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset='utf-8'>
</head>
<body>
<form method="POST">
    <label>кол-во от 5 до 100<input type="number" min="5" max="100"  name="N"></label>
    <input type="submit"  value="отправить">
</form>

<?php
// $arrX = array(1, 112, 105, 149, 117, 5, 200, 111, 525, 114, 99, 1237, 1239);
if(isset($_POST["N"])){
    $n = $_POST["N"];
}

for($i = 0; $i < $n; $i++){
    $arrX[] = rand(0, 500);
}
echo '<pre> X:';
print_r($arrX);
echo '</pre>';

function createZ($arrX){
    foreach($arrX as $i){
        $buf = $i;
        $flag = true;
        $counter = 0;
        while(intdiv($buf, 10)){
            if ($buf % 10 == 0){
                $flag = false;
                break;
            }
            else{
                $buf = intdiv($buf, 10);
                $counter++;
            }
        }
        if($flag == true && $counter >= 2){
            $arrZ[] = $i;
        }
    }

    return replace($arrZ);
}

function replace($arrZ){
    $max = PHP_INT_MIN;
    $min = PHP_INT_MAX;
    for($i = 0; $i < count($arrZ); $i++){
        $flag = true;
        for($j = 2; $j < $arrZ[$i]; $j++){
            if($arrZ[$i] % $j == 0){
                $flag = false;
                break;
            }
        }
        if($arrZ[$i] > $max && $flag == false){
            $max = $arrZ[$i];
            $maxI = $i;
        }
        if($arrZ[$i] < $min && $flag == true){
            $min = $arrZ[$i];
            $minI = $i;
        }
    }
    if($max ==  PHP_INT_MIN || $min == PHP_INT_MAX){
        echo " поменять местами нельзя";
    }
    else{
        echo " max: $max [$maxI] min: $min [$minI]";
        $arrZ[$maxI] = $min;
        $arrZ[$minI] = $max;
    }
    return $arrZ;
}

$arrZ = createZ($arrX);

echo '<pre> Z:';
print_r($arrZ);
echo '</pre>';

?>
</body>
</html>
