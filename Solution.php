<?php

/*
 * Complete the 'caesarCipher' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. INTEGER k
 */

function caesarCipher($s, $k) {
    $strRes = '';
    for ($i = 0; $i < strlen($s); $i++){
        $cod = ord($s[$i]);
        if(45 == $cod){
            $strRes .= '-';
        } else {
            $strRes .= getCalculatedChar($cod, $k);
        }
    }
    return $strRes;
}

function getCalculatedChar($cod, $rot){
    $isLowerCase = (97 <= $cod) && (122 >= $cod);
    $isUpperCase = (65 <= $cod) && (90 >= $cod);
    $reducedRot = $rot % 26;
    $rotatedPos = $cod + $reducedRot;
    if ($isLowerCase && ($rotatedPos > 122)) {
        return chr($rotatedPos - 26);
    } else if($isLowerCase){
        return chr($rotatedPos);
    } else if ($isUpperCase && $rotatedPos > 90) {
        return chr($rotatedPos - 26);
    } else if ($isUpperCase){
        return chr($rotatedPos);
    } else {
        return chr($cod);
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s = rtrim(fgets(STDIN), "\r\n");

$k = intval(trim(fgets(STDIN)));

$result = caesarCipher($s, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
