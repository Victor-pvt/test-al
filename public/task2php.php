<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 11.11.15
 * Time: 0:14
 */





$calc = [
    'a' => 1 / 3,
    'b' => 1 / 6,
    'c' => 1 / 2
];
$count = isset($_POST['count']) ? 0 + $_POST['count'] : 0;
$output = getArrOut($calc, $count);

$params = [
        'calc' => $output['calc'],
        'ves' => $output['ves'],
        'count' => $count,
        'vesOut' => $output['vesout'],
];
include 'task2html.php';

function getArrOut($calc, $count){
    $output = [];
    $calcOut = [
        'a' => 0,
        'b' => 0,
        'c' => 0
    ];
    $vesIn = getVes($calc);

    for ($i = 1; $i <= $count; $i++) {
        $keyCalc = getKey($calc, $vesIn, $calcOut);
        foreach ($calc as $key=>$arrin) {
            if($keyCalc == $key){
                $calcOut[$key] =$calcOut[$key]+1;
            }
        }
    }
    $output['calc'] = $calcOut;
    $output['ves'] = $vesIn;
    $output['vesout'] = getVes($calcOut);

    return $output;
}

 function getKey($arrin, $vesIn,$calcOut){
    $vesOut = getVes($calcOut);

    $ch= '';
    $k= 0;
    foreach($vesOut as $key=>$out){
        $in=$vesIn[$key];
        $t=$out - $in;
        if( $k > $t){
            $ch = $key;
            $k = $t;
        }
    }

    if($ch == ''){
        $key = rand (1, count($arrin));
        $i=1;
        foreach($arrin as $tey=>$ar){
            if($i == $key){
                $ch= $tey;
                break;
            }
            $i=$i+1;
        }

    }
    return $ch ;
}
 function getVes($arrs){
    $it = 0;
    foreach($arrs as $arr){
        $it = $it + $arr;
    }
    $ves = [];
    foreach($arrs as $key=>$arr){
        $ves[$key] = $it> 0 ? floor($arr/$it *100 ): 0;
    }
    return $ves;
}
