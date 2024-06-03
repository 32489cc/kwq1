<?php
/**
 * 初期パスワード生成
 *
 */
function create_password($length=8)
{
    $pwd_string=array(
        "large"=>range('A','Z'),
        "small" =>range('a','z'),
        "number"=>array('0','9'),
        "symbol"=>array(
           "!","/","#","$","%","&","'","(",")"
        )
    );
    $arr=['1','saddsadad','5','?','4'];
var_dump(array_search('Z',$pwd_string['large']));
    $pwd=array();
    //指定された桁数文字を選択
    while(count($pwd)<$length){
        if(count($pwd)<3){
            $key=key($pwd_string);
            next($pwd_string);
        }else{
            $key=array_rand($pwd_string);
        }
        $pwd[]=$pwd_string[$key][array_rand($pwd_string[$key])];

    }
    shuffle($pwd);
    $result=implode($pwd);
    return $result;
}
