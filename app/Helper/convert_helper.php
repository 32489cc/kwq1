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

/**
 * テキストエリア入力部に対する改行コード変換処理
 */
function convert_br_to_kaigyo_code($text)
{
    return preg_replace('/\<br \/\>/','\r\n',preg_replace('/\r\n|\n\r|\r/','',$text));


}

/**
 * 入力文字変換(全角カナ→半角カナ)
 */
function  get_convert_single_kana($post)
{
$convert_str= mb_convert_kana($post['str'],'kh');
//全角スペースを半角スペースに変換
    $convert_str=str_replace('　','',$convert_str);
    return $convert_str;
}
/**
 * 半角カタカナを変換
 */
function replace_katakana($katakana)
{
    $replace_target=array(
        '　'=>'',
        'ｵ'=>'オ',
        'ｱ'=>'ア',
        'ｳ'=>'イ',
        'ｴ'=>'ウ',
    );
    $search=array_keys($replace_target);
    $replace=array_values($replace_target);
    $result=str_replace($search,$replace,$katakana);
    return $result;
}
