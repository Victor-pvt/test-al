<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 18.07.14
 * Time: 22:10
 */

$d = getdate(time());

$strdate = $d['mday'] . '-' . $d['mon'] . '-' . $d['year'];

echo $strdate;

echo "<br>";

$stroka = 'Аргентина манит негра';
$stroka1 = 'Sum summus mus';
$stroka2 = 'А роза упала на лапу Азора';
$stroka3 = 'А роза упала на лапу Азора Аргентина';
$stroka4 = 'Sumasummus mus';

if (_one($stroka)) {
    echo 'палиндром ' . $stroka;
}
else {
    $out = _two($stroka);
    if ($out) {
        echo 'част палиндром ' . $out;
    }
    else {
        echo 'не палиндром ' . mb_substr($stroka, 0, 1, 'UTF-8');;
    }
}

function _one($str)
{
    $lowerStr = mb_strtolower($str, 'UTF-8');
    $aStr = str_replace(' ', '', $lowerStr);
    $reversStr = iconv("UTF-16LE", "UTF-8", strrev(iconv("UTF-8", "UTF-16BE", $aStr)));
    if ($aStr == $reversStr) {
        return TRUE;
    }

    return FALSE;
}

function _two($str)
{
    $lowerStr = mb_strtolower($str, 'UTF-8');
    $aStr = str_replace(' ', '', $lowerStr);
    $maxLen = mb_strlen($aStr, 'UTF-8');
    for ($i = 0; $i <= $maxLen - 1; $i++) {
        $str1 = mb_substr($aStr, $i, $maxLen - $i, 'UTF-8');
        $_maxLen = mb_strlen($str1, 'UTF-8');
        for ($k = 0; $k <= $_maxLen - 1; $k++) {
            $lstr = mb_substr($str1, 0, $_maxLen - $k, 'UTF-8');
            $bStr = iconv("UTF-16LE", "UTF-8", strrev(iconv("UTF-8", "UTF-16BE", $lstr)));
            if ($lstr == $bStr) {
                return $str . ' - ' . $lstr;
            }
        }
    }

    return FALSE;
}

/*
 * 1 -     var element = document.getElementById("t");
    element.classList.add("a");
2 -   $('table tr td').removeClass('c');
 $('table tr td').css({"color":"green"});

3 -  $('table tr').addClass('a');



1 - select * from category where parent_category_id = null and substring(name,1,4) = 'авто'

2 - SELECT c.id, c.parent_category_id, c.name FROM category as c
INNER JOIN category as ct
ON c.id = ct.parent_category_id
WHERE 4 > (SELECT count(*) FROM category as ctc WHERE c.id = ctc.parent_category_id)
AND c.parent_category_id !=0
GROUP BY c.id

3-SELECT * FROM category as c
WHERE 0= (SELECT count(*) FROM category as ct where c.id = ct.parent_category_id)
and parent_category_id !=0


 */


echo phpinfo();
