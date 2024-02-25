<?php

namespace App\Http\Controllers;

use App\Models\ExamChangesModel;
use Illuminate\Http\Request;

class ExamChange extends Controller
{
    private $this_the_year=2023;
    private $prm_univ_cd4='';


    public function index($univ_cd4)
    {
        $this->prm_univ_cd4=$univ_cd4;
        $this->edit_page();
        return view('general.exam_change',['viewdata'=>$this->viewdata]);
    }
    private function edit_page()
    {
        $max_the_year=$this->this_the_year;
        $this->viewdata['max_the_year']=$max_the_year;

        $this->edit_chg_pt_data($max_the_year-1);
        $this->edit_chg_pt_data($max_the_year);
    }

    private function edit_chg_pt_data($the_year)
    {
    //宣言
        $rec_list=array(); //比較値格納
        $rec_count=array('0'=>0,'1'=>0,'2'=>0); //カウント値格納
        $chg_pt_data=ExamChangesModel::get_chg_pt($this->prm_univ_cd4,$the_year);
        if(count($chg_pt_data)!==0){
            $this->viewdata['main_list'][$the_year]=$chg_pt_data;
        }



    }
}
