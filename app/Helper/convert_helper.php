<?php
//関数名：convert_large_space_to_small_space
//処理概要：全角スパースを半角スペースに変換する
function convert_large_space_to_small_space($l_large_target)
{
    $l_large_targets_tmp=$l_large_target;
    $s_space_targets=mb_convert_kana($l_large_targets_tmp,'s');
    return $s_space_targets;
}
//function convert_character_code($str,$to_encoding="SJIS-win")
//{
//    $user_agent=$_SERVER['HTTP_USER_AGENT'];
//    if(strstr($_SERVER['HTTP_USER_AGENT'],'msie')||strstr($_SERVER['HTTP_USER_AGENT'],'firefox')){
//
//    }
//}
