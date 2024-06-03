<?php
namespace App\Libraries;
class ToTp
{
    /**
     * @param string $secret_key 秘密鍵
     * @param int  $token_length
     * @param $period //トークン生成間隔
     * @param string アルゴリズム
     */
    public function __construct(int $token_length, $period=30,$algorithm='sha1')
    {
        $this->token_length=$token_length;
        $this->period=$period;
        $this->algorithm=$algorithm;

    }
    public function generate($secret_key,$clock)
    {
        if($clock=== null){
            $clock=time();
        }
     $key=base64_decode($secret_key);
    $moving_factor=floor($clock/$this->period);
    $b=[];
    while ($moving_factor>0){
        $b[]=chr($moving_factor & 0xff);
        $moving_factor >>=8;
    }
    $text=str_pad(implode('',array_reverse($b)),8,"\0",STR_PAD_LEFT);
    $hash=hash_hmac($this->algorithm,$text,$key,true);
    $offset=ord($hash[19]) & 0xf;
    $token_base=(ord($hash[$offset]) & 0x7f) <<24
        |(ord($hash[$offset+1]) & 0xff) <<16
        |(ord($hash[$offset+2]) & 0xff) <<8
        |(ord($hash[$offset+3]) & 0xff) ;
    $token=$token_base % pow(10,$this->token_length);
    return str_pad($token,$this->token_length,0,STR_PAD_LEFT);
    }
}
