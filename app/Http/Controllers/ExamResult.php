<?php

namespace App\Http\Controllers;

use App\Models\ExamScore;
use App\Models\UnivModel;
use Illuminate\Http\Request;
use App\Models\DepartmentSub;


class ExamResult extends Controller
{
    const PAGE_VIEW='general.exam_result';

    const PUL_DEFAULT_VALUE="0";
    const PUL_DEFAULT_TEXT="選択してください";
    private $prm_univ_cd4= '';
    private $prm_pul_s_gohi_dep='';
    private $prm_pul_s_gohi_sub='';
    private $prm_pul_s_jittai_dep='';


    public function index($univ_cd4='')
    {
        $this->prm_univ_cd4=$univ_cd4;

        $this->edit_page_common();
        return view(self::PAGE_VIEW,['viewdata'=>$this->viewdata]);
    }
    private function edit_page_common()
    {
      $result=DepartmentSub::get_dep_sub_list($this->prm_univ_cd4);
    $query=UnivModel::get_ma_univ($this->prm_univ_cd4);
      $this->viewdata['univ_name']=$query['univ_name'];
      $this->viewdata['univ_cd4']=$this->prm_univ_cd4;
      $this->viewdata['pul_s_gohi_dep']=$this->prm_pul_s_gohi_dep;
      $this->viewdata['pul_s_gohi_sub']=$this->prm_pul_s_gohi_sub;
      $this->edit_pul_s_gohi_dep($result);
    }
    private function edit_pul_s_gohi_dep($result)
    {
        $pul_s_gohi_dep_val[0]=self::PUL_DEFAULT_VALUE;
        $pul_s_gohi_dep_lbl[0]=self::PUL_DEFAULT_TEXT;
        $pul_s_gohi_sub_val[0]=self::PUL_DEFAULT_VALUE;
        $pul_s_gohi_sub_lbl[0]=self::PUL_DEFAULT_TEXT;

        $dep_sub_list='"'.self::PUL_DEFAULT_VALUE.'",['.self::PUL_DEFAULT_VALUE.','.self::PUL_DEFAULT_TEXT;
//        $dep_sub_list[0]=self::PUL_DEFAULT_VALUE;
//        $dep_sub_list[1]=''"["''.self::PUL_DEFAULT_VALUE.'","'.self::PUL_DEFAULT_TEXT.'"]"';
        $dep_cnt=0;
        $sub_cnt=0;
        foreach ($result as $dep_row){
            if($pul_s_gohi_dep_val[$dep_cnt]!==$dep_row['dep_cd']){
                $dep_cnt++;
                $pul_s_gohi_dep_val[$dep_cnt]=$dep_row['dep_cd'];
                $pul_s_gohi_dep_lbl[$dep_cnt]=$dep_row['dep_cd_name'];
            }
        }
//        学部が１つしかない場合
        if(count($pul_s_gohi_dep_val)=='2'){
            $this->prm_pul_s_gohi_dep=$pul_s_gohi_dep_val[1];
            $this->prm_pul_s_jittai_dep=$pul_s_gohi_dep_val[1];
        }

        $dep_cnt=0;
        foreach ($result as $dep_row){
            if($pul_s_gohi_dep_val[$dep_cnt]!==$dep_row['dep_cd']){
                $dep_cnt++;
                $pul_s_gohi_dep_val[$dep_cnt]= $dep_row['dep_cd'];
                $pul_s_gohi_dep_lbl[$dep_cnt]=$dep_row['dep_cd_name'];
                $dep_sub_list.='],'.$dep_row['dep_cd'].',[';
                $dep_sub_list.=self::PUL_DEFAULT_VALUE.','.self::PUL_DEFAULT_TEXT;
            }
            $dep_sub_list.=','.$dep_row['sub_cd'].','.$dep_row['boshu_name'];

            if($this->prm_pul_s_gohi_dep==$dep_row['dep_cd']){
                $sub_cnt++;
                $pul_s_gohi_sub_val[$sub_cnt]=$dep_row['sub_cd'];
                $pul_s_gohi_sub_lbl[$sub_cnt]=$dep_row['boshu_name'];
            }
        }
        $dep_sub_list.=']';
        //        学部が１つしかない場合
        if(count($pul_s_gohi_dep_val)=='2'){
            $this->prm_pul_s_gohi_sub=$pul_s_gohi_sub_val[1];
        }


// 使用正则表达式匹配子数组和独立元素
        preg_match_all('/\[(.*?)\]|([^,]+)/', $dep_sub_list, $matches);

        $result = array_map(function ($match) {
            // 检查是否为子数组
            if (strpos($match, '[') !== false) {
                // 移除括号并拆分
                return explode(',', trim($match, '[]'));
            }
            return $match;
        }, $matches[0]);

//        var_dump($result);

        $this->viewdata['pul_s_gohi_dep']=$this->prm_pul_s_gohi_dep;
        $this->viewdata['pul_s_gohi_dep_val']=$pul_s_gohi_dep_val;
        $this->viewdata['pul_s_gohi_dep_lbl']=$pul_s_gohi_dep_lbl;
//var_dump($dep_sub_list);
        $this->viewdata['dep_sub_list']=$result;
        $this->viewdata['pul_s_gohi_sub']=$this->prm_pul_s_gohi_sub;
        $this->viewdata['pul_s_gohi_sub_val']=$pul_s_gohi_sub_val;
        $this->viewdata['pul_s_gohi_sub_lbl']=$pul_s_gohi_sub_lbl;
    }

    public function exam_dep_sub_result(Request $request)
    {
        if (!$request->isMethod('post')) {
            return true;
        }

        $html_result='';
        $html_result2='';
        $is_data=false;
        $exam_score_list=ExamScore::get_dep_sub_list(
            $request->input('univ_cd4'),
            $request->input('dep_val'),
            $request->input('sub_val')
        );

        if(count($exam_score_list)==0){
            $is_data=false;
            $html_result="データが存在しません";
        }
        else{
            $is_data=true;
            $html_result2="<tr>
                            <th>学校名</th>
                            <th>学科</th>
                            <th>学部</th>
                            <th>成绩</th>
                            <th>年份</th>
                            </tr>";
        for ($i=0;$i<count($exam_score_list);$i++){
            $tmp_univ_cd4=$exam_score_list[$i]['univ_cd4'];
            $tmp_dep_name=$exam_score_list[$i]['dep_name'];
            $tmp_sub_name=$exam_score_list[$i]['sub_name'];
            $tmp_sub_score=$exam_score_list[$i]['score'];
            $tmp_year=$exam_score_list[$i]['year'];

            $html_result=$html_result."
            <tr>
            <td>$tmp_univ_cd4</td>
            <td>$tmp_dep_name</td>
            <td>$tmp_sub_name</td>
            <td>$tmp_sub_score</td>
            <td>$tmp_year</td>
            </tr>";
        }
        $result=array('is-data'=>$is_data,
            'html_data'=>$html_result,
            'html_data2'=>$html_result2);
        return response()->json($result);
        }
    }
}


