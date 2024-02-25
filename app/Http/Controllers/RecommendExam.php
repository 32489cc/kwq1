<?php

namespace App\Http\Controllers;

use App\Models\RecommendModel;
use App\Models\UnivModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecommendExam extends Controller
{
    public function index($univ_cd4='')
    {

        $result_data=RecommendModel::get_recommend_search_result($univ_cd4);
        $this->viewdata['univ_cd4']=$univ_cd4;
       // $rec_ao_data=edit_rec_data($result_data);
        return view('recommend.exam_rec',['viewdata'=>$this->viewdata]);
    }
    public function download_xmlss_print($univ_cd4='')
    {
        $uid=uniqid(rand());//uniqid是一个生成独一数字的函数
        $out_fname='tmp_F_recommend_'.$uid;
        $out_full_fname=base_path('storage').'/tmp/'.$out_fname;
        //大学名获取
        $univ_name=UnivModel::get_univ_name($univ_cd4);
        if(empty($univ_name)){
            echo "無効なアクセス";
            exit();
        }

        $fp=fopen($out_full_fname,'w');
        //helperで共通処理
        //ヘッダー一部分をファイルに出力
        fwrite($fp,get_univ_info_xmlss_header_print(1));
        //スタイルを取得部分を出力
        fwrite($fp,get_univ_info_xmlss_style_print('recommend'));

        fclose($fp);
        header("Content-Type: application/json; charset=utf-8");
        header("X-content-Type-Options:nosniff");

        return response()->json(array('uid'=>$uid));
    }

    private function edit_excel_recommend($univ_cd4,$univ_name,$fp,$output_type)
    {
        $result_data=RecommendModel::get_recommend_search_result($univ_cd4);
        fwrite($fp,_get_univ_info_xmlss_content_header_recommend($output_type,$univ_name));
    }
    public function execute_download_xmls_print(Request $request)
    {
        $output_file_name="総合性選抜_";
        $output_file_name=$output_file_name.date('Ymd_His').'.xml';
        //$output_file_name=convert_character_code($output_file_name);
        $uid = $request->input('uid');
$in_fname= 'tmp_F_recommend_'. $uid;
$in_full_fname = base_path('storage').'/tmp/'.$in_fname;
$fp = fopen ($in_full_fname, 'r');
if ($fp == FALSE) {
    Log::error('failed to open stream:' . $in_full_fname . ':' . date('Y-m-d H:i:s'));
    exit;
}
header ("Content-Type: text/xml; charset=UTF8");
header ("Content-Disposition: attachment; filename=".$output_file_name."");
while (!feof($fp)) {
    //ファイルから一行読み込む
    $line = fgets($fp);
//読み込んだ行を出力する
    print $line;
}
//ファイルをクローズする
fclose($fp);
//ダウンロードが終わったら削除する。
unlink ($in_full_fname);
exit;
    }
}
