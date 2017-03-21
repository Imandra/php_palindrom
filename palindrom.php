<?php
$str = 'Алла Пугачева';
$str = str_replace(' ', '', $str);
$str = mb_strtolower($str);
$flag = false;
for ($subst_length = mb_strlen($str); $subst_length > 1; $subst_length--) {
    for ($start_char = 0; $start_char <= mb_strlen($str) - $subst_length; $start_char++) {
        $substring = mb_substr($str, $start_char, $subst_length);
        $substring_rev = strrev_enc($substring);
        if ($substring_rev == $substring) {
            $flag = true;
            echo $substring;
            break 2;
        }
    }
}
if (!$flag)
    echo mb_substr($str, 0, 1);

function strrev_enc($st)
{
    $st = iconv('utf-8', 'windows-1251', $st);
    $st = strrev($st);
    $st = iconv('windows-1251', 'utf-8', $st);
    return $st;
}
