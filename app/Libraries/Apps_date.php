<?php

namespace App\Http\Libraries;

class  Apps_date
{
    const NENDO_START_DATE = '0401'; //年度開始日
    const NENDO_END_DATE = '0331';
    const GENGO_CODE_MEIJI = '1';
    const GENGO_CODE_TAISHO = '2';
    const GENGO_CODE_SHOWA = '3';
    const GENGO_CODE_HEISEI = '4';
    const GENGO_CODE_REIWA = '5';

    const GENGO_NAME_MEIJI = '明治';
    const GENGO_NAME_TAISHO = '大正';
    const GENGO_NAME_SHOWA = '昭和';
    const GENGO_NAME_HEISEI = '平成';
    const GENGO_NAME_REIWA = '令和';

    const GENGO_START_MEIJI=18680125;
    const GENGO_START_TAISHO=19120730;
    const GENGO_START_SHOWA=19261225;
    const GENGO_START_HEISEI=19890108;
    const GENGO_START_REIWA=120190501;
    public $gengo_array= [];
    public function __construct()
    {
        $this->gengo_array=[
           static::GENGO_CODE_MEIJI =>[
               'name'=>static::GENGO_NAME_MEIJI,
               'roma'=>'M',
               'start'=>static::GENGO_START_MEIJI,
               'yyyy'=>'1867',
           ],
            static::GENGO_CODE_TAISHO =>[
                'name'=>static::GENGO_NAME_MEIJI,
                'roma'=>'M',
                'start'=>static::GENGO_START_MEIJI,
                'yyyy'=>'1867',
            ],
            static::GENGO_CODE_SHOWA =>[
                'name'=>static::GENGO_NAME_MEIJI,
                'roma'=>'M',
                'start'=>static::GENGO_START_MEIJI,
                'yyyy'=>'1867',
            ],
            static::GENGO_CODE_HEISEI =>[
                'name'=>static::GENGO_NAME_MEIJI,
                'roma'=>'M',
                'start'=>static::GENGO_START_MEIJI,
                'yyyy'=>'1867',
            ],
            static::GENGO_CODE_REIWA =>[
                'name'=>static::GENGO_NAME_MEIJI,
                'roma'=>'M',
                'start'=>static::GENGO_START_MEIJI,
                'yyyy'=>'1867',
            ],
        ];
    }


    public function online_date($format)
    {
        $online_date = config('constants.online_date');
        if (!$online_date || empty($online_date)) {
            switch ($format) {
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
                    $time = getdate();
                    var_dump($time);
                    return date('Y/m/d') . ' ' . $time['hours'] . ':00:00';
                default:
                    return date('Y/m/d H:i:s');
            }
        } else {
            switch ($format) {
                case 'Y-m-d H:i:s':
                    return $online_date . ' ' . date('H:i:s');
                case 'Y-m-d':
                    return $online_date;

                case 'Ymd':
                    return str_replace('-', '', $online_date);

                case 'Ym':
                    return str_replace('-', '', substr($online_date, 0, 7));

                case 'Y':
                    return substr($online_date, 0, 4);

                case 'm':
                    return substr($online_date, 5, 2);

                case 'd':
                    return substr($online_date, 8, 2);

                case 'Y/m/d H:i:s':
                    return str_replace('-', '/', $online_date) . ' ' . date('H:i:s');
                case 'Y/m/d H:00:00':
                    $time = getdate();
                    return str_replace('-', '/', $online_date . '' . $time['hours'] . '00:00');
                default:
                    return $online_date . '' . date('H:i:s');
            }

        }
    }

    /* 和暦を西暦に変換
     * @param string
     */
    public function get_ad_date($gengou, $yymmdd)
    {
        if (empty($gengou) || empty($yymmdd)) {
            return '';
        }
        $yy = substr($yymmdd, 0, 2);
        $mmdd = substr($yymmdd, 2, 4);
        if (array_key_exists($gengou, $this->gengo_array)) {
            $year = $this->gengo_array[$gengou]['yyyy'] + (int)$yy;
        }
        //年度の返却
        $ymd = $year . $mmdd;
        return $ymd;
    }

    /**
     * 和暦を西暦に変換
     *
     *
     *
     */
    function get_gc_date($yyyymmdd,$format)
    {
        $result_yyyymmdd='';
        if(!empty($yyyymmdd)){
            $year=substr($yyyymmdd,0,4);
            $month=substr($yyyymmdd,4,2);
            $day=substr($yyyymmdd,6,4);

            if(checkdate($month,$day,$year)){
                foreach ($this->gengo_array as $key=>$val){
                    if((int)$yyyymmdd>=$val['start']){
                        $gengo_code=$key;
                        $gengo_name=$val['name'];
                        $gengo_roma=$val['roma'];
                        $wareki_y=$year-$val['yyyy'];
                    }
                    if($format==='cyymmdd'){
                        $wareki_y=sprintf('%02s',$wareki_y);
                        $result_yyyymmdd=$gengo_code.$wareki_y.substr($yyyymmdd,4);
                    }
                }
            }
        }
        return $result_yyyymmdd;
    }


    /**
     *
     * 基準日から年齢を計算
     */
    public function get_age($birthday,$reference_date=null)
    {
        $age=null;
        if(is_null($reference_date)){
            $check_date=self::online_date('Ymd');
        }else{
            $check_date=$reference_date;
        }

        $age=floor(($check_date-$birthday)/10000);

        return $age;
    }

    /**
     * 和暦日付妥当性チェック
     * 変換した日付が各年号範囲以内ならTRUE
     *
     */
    function check_ad_date($gengou,$yymmdd)
    {
        $yyyymmdd=$this->get_ad_date($gengou,$yymmdd);
        if(empty($yyyymmdd)){
            return FALSE;
        }
        $search_flg=FALSE;
        $end_yyyymmdd='20871231';
        foreach ($this->gengo_array as $key=>$val){
            if($search_flg){
                $end_yyyymmdd=$val['start'];
                break;
            }
            if(intval($gengou)===intval($key)){
                $start_yyyymmdd=$val['start'];
                $search_flg=TRUE;
            }
        }
        if(($yyyymmdd<$start_yyyymmdd) OR ($end_yyyymmdd<$yyyymmdd)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
