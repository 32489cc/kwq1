<?php

namespace App\Http\Controllers;


use App\Http\Libraries\Apps_date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class Usage extends Controller
{
    private $date;
    public function __construct()
    {
        $this->date=new Apps_date();
    }

    public  function index(Request $request)
    {
        $system_date_year=$this->date->online_date('Y');
        $system_date_month=$this->date->online_date('m');
        $system_date_day=$this->date->online_date('d');
        //取得日は1/1~3/31の場合
        if($system_date_month==='01' OR $system_date_month==='02' OR $system_date_month==='03'){
            $this_year=$system_date_year-1;
        }else{
            $this_year=$system_date_year;
        }
        //今年度初設定
        $min_this_year=$this_year;
        $min_this_year.='0401';
        //今年度末設定
        $max_this_year=$this_year+1;
        $max_this_year.='0331';

        //昨年度初と末設定
        $min_last_year=(string)($min_this_year-10000);
        $max_this_year=(string)($max_this_year-10000);

        //初期値設定
        $result_members_status_count=0;
        $personal_name=null;
        $department_code=null;
        $department_name=null;

        //画面のpostを取得
        $post=$request->input();
        $this->viewdata['hyojo_flg']='0';
        if(!empty($post)){
         $validate_result=$this->__validate($post,$max_this_year,$min_this_year);
            if($validate_result->fails()){
                dd($validate_result);
                return redirect()->route('get_insured_no')->withErrors($validate_result);
            }else{
                dd($validate_result);
                $insured_no=$request->input('insured_no');
            }
        }
        return view('usage.status');
    }

    private function __validate($data,$max_this_year,$min_this_year)
    {

        $rules = [
            'insured_no' => ['alpha_num',
                            'min:3',
                            'max:50',

]
        ];
 $rules['insured_no'][]=
     Rule::exists('member_manage','insured_no')->where(function ($query) use($max_this_year,$min_this_year) {

         $query->whereBetween('acquired_ymd', [$min_this_year, $max_this_year]);

     });


 //$rules=array_merge($rules,$composited_rule);
        $messages = [
            'insured_no.alpha_num' => 'Username is required.',
            'insured_no.min' => 'Username must be at least 3 characters.',
            'insured_no.max' => 'Username may not be greater than 50 characters.',
            'insured_no.exists' => 'The insured number does not exist or does not meet the date criteria.',
        ];



        $validator=Validator::make($data,$rules,$messages);

        return $validator;


    }
}
