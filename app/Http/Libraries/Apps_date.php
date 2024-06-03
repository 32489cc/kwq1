<?php
namespace App\Http\Libraries;

class  Apps_date
{
    const NENDO_START_DATE ='0401'; //年度開始日
    const NENDO_END_DATE='0331';
    const GENGO_CODE_MEIJI='1';
    const GENGO_CODE_TAISHO='2';
    const GENGO_CODE_SHOWA='3';
    const GENGO_CODE_HEISEI='4';
    const GENGO_CODE_REIWA='5';

    const GENGO_NAME_MEIJI='明治';
    const GENGO_NAME_TAISHO='大正';
    const GENGO_NAME_SHOWA='昭和';
    const GENGO_NAME_HEISEI='平成';
    const GENGO_NAME_REIWA='令和';


    public function __construct()
    {
//        $this->gengo_array=[
//
//        ]
    }


    public function online_date($format)
    {
        $online_date=config('constants.online_date');
        if(!$online_date || empty($online_date)){
            switch($format){
                case 'YmdHis':
                    return date('YmdHis');

                case 'Y-m-d H:i:s':
                    return date('Y-m-d H:i:s');

                case 'Y-m-d':
                    return date('Y-m-d');

                case 'Ymd':
                    return date('Ymd');

                case 'Ym':
                    return date('Ym');

                case 'Y':
                    return date('Y');

                case 'm':
                    return date('m');

                case 'd':
                    return date('d');
                case 'Y/m/d H:i:s':
                    return date('Y/m/d H:i:s');
                case 'Y-m-d 00:00':
                    return date('Y-m-d 00:00');
                case 'Y-m-01 00:00:00':
                    return date('Y-m-01 00:00:00');
                case 'Y-m-d H:00:00':
                    $time=getdate();
                    return date('Y/m/d').' '.$time['hours'].'00:00';
                default:
                    return date('Y/m/d H:i:s');
            }
        }else{
            switch ($format){
                case 'Y-m-d H:i:s':
                    return $online_date.' '.date('H:i:s');
                case 'Y-m-d':
                    return $online_date;

                case 'Ymd':
                    return str_replace('-','',$online_date);

                case 'Ym':
                    return str_replace('-','',substr($online_date,0,7));

                case 'Y':
                    return substr($online_date,0,4);

                case 'm':
                    return substr($online_date,5,2);

                case 'd':
                    return substr($online_date,8,2);

                case 'Y/m/d H:i:s':
                    return str_replace('-','/',$online_date).' '.date('H:i:s');
                case 'Y/m/d H:00:00':
                    $time=getdate();
                    return str_replace('-','/',$online_date. ''.$time['hours'].'00:00');
                default:
                    return $online_date.''.date('H:i:s');
            }

        }
    }

    /* 和暦を西暦に変換
     * @param string
     */
    public function get_ad_date($gengou,$yymmdd)
    {
        if(empty($gengou)||empty($yymmdd)){
            return '';
        }
        $yy=substr($yymmdd,0,2);
        $mmdd=substr($yymmdd,2,4);
        if(array_key_exists($gengou,$this->gengo_array)){
            $year=$this->gengo_array[$gengou]['yyyy']+$yy;
        }
        $ymd=$year.$mmdd;
        return $ymd;
    }
}
