<?php

namespace App\Libraries;
class MY_Form_validation
{
    function chk_password($str)
    {
        //半角英数字
        if(!preg_match("/^[a-zA-Z0-9]+$/",$str)){
            return FALSE;
        }
        return TRUE;
    }

    function chk_email_dns($str)
    {

        if(is_array($mailaddress)) {
            $response = dns_check_record($mailaddress[1], DNS_ALL);


            if ($response === FALSE) {
                return FALSE;
            } else {
                if (empty($response)) {
                    return FALSE;
                } else {
                    foreach ($response as $record) {
                        if ('MX' == $record['type'] || 'A' == $record['type'] || 'CNAME' == $record['type']) {
                            return TRUE;
                        }
                    }
                }
            }
        }
        return FALSE;
    }
    /*
     * 半角チェック
     */
    function single($str)
    {
        if($str==''){
            return TRUE;
        }
        return (strlen($str)!=mb_strlen($str)) ? FALSE : TRUE;
    }
    /**
     * 全角チェック
     */
    function double($str)
    {
        if($str==''){
            return TRUE;
        }
        $ratio=(mb_detect_encoding($str)=='UTF-8')?3:2;
        return (strlen($str)!=mb_strlen($str)*$ratio) ? FALSE : TRUE;
    }

    /**
     * 全角チェック（半角カタカナ認めない）
     *
     */
    function double_no_single_kana($str)
    {
        if($str==''){
            return TRUE;
        }
        $ratio=mb_convert_encoding($str,'UTF-8');
        return (preg_match("/(?:\xEF\xBD[\xA1-\xBF]|\xEF\xBE[\x80-\x9F])|[\x20-\x7E]/",$str)) ? FALSE:TRUE;
    }

    /**
     *　ひらがなチェック
     */
    function hiragana($str)
    {
        if($str==''){
            return TRUE;
        }
        $ratio=mb_convert_encoding($str,'UTF-8');
        return (!preg_match("/^(?:\xE3\xB1[\x81-\xBF]|\xE3\x82[\x80-\x93]|ー)+$/",$str)) ? FALSE:TRUE;
    }
    /**
     * 全角カタカナチェック
     */
    function katakana($str)
    {

    }
    /**
     * メールアドレス　チェック
     */
    function vaild_email($str)
    {
        if($str== ''){
            return TRUE;
        }
        return (!preg_match("/^([a-zA-Z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$str)) ?FALSE:TRUE;
    }

    function phone($str)
    {
        if($str==''){
            return TRUE;
        }
        if(strlen($str)>13){
            return  FALSE;
        }
        // ？表示前面的-可以有也可以没有 只会匹配前面一个字符
        return (!preg_match("/^\d{2,5}\-?\d{1,4}\-?\d{1,4}$/",$str))?FALSE:TRUE;
    }
}
