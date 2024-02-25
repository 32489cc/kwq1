<?php

function edit_border_rate_info($border_rate_list)
{
$wk_list_count=0;
$tmp_dep_name='';
$border_info_list=[];
foreach ($border_rate_list as $border_data){
    if(!isset($univ_type_koku)){
        $univ_type_koku=__is_univ_pattern($border_data['univ_typ']);

    }

    // 学部学科名
    $dep_name=$border_data['dep_cd_name'].$border_data['dep'];
    if(empty($dep_name)){
        $dep_name= ' ';
    }
    if($wk_list_count ===0){
        $tmp_dep_name=$dep_name;
    }

    $sub_name=$border_data['boshu_name'];
    // 日程
    $wk_sch_method_title=__get_sch_method_name($border_data);
    //ボーダー得点率　偏差値編集
    $wk_border_sc_rate=__get_border_sc_rate($border_data);
    $wk_rank_ss=__get_rank_ss($border_data);

    $border_info_list[$wk_list_count]=array(
        "dep_name"=>$dep_name,
        "sub_name"=>$sub_name,
        "wk_sch_method_title"=>$wk_sch_method_title,
        "wk_border_sc_rate"=>$wk_border_sc_rate,
        "wk_rank_ss"=>$wk_rank_ss
    );
    $wk_list_count++;
}

return $border_info_list;
}

function __is_univ_pattern($univ_typ)
{
    $univ_pattern=false;
    if($univ_typ==='1' or $univ_typ==='2'){
        $univ_pattern=true;
    }

    return $univ_pattern;
}
function __get_sch_method_name($border_data)
{
    if(!isset($border_data['sch_method_name']) or $border_data['sch_method_name']===''){
        if($border_data['univ_typ']==='1'){
            $sch_method_name=\App\Http\Controllers\BorderRate::SCH_METHOD_NAME_CENTER;
        }else{
            $sch_method_name=\App\Http\Controllers\BorderRate::SCH_METHOD_NAME_IPPAN;
        }
    }else{
        if($border_data['univ_group']==='1'){
            $sch_method_name=\App\Http\Controllers\BorderRate::SCH_METHOD_NAME_SHORT.$border_data['sch_method_name'];
        }else if($border_data['univ_group']==='N'){
            $sch_method_name='';
        }else{
           $sch_method_name=$border_data['sch_method_name'];
        }
    }
    return $sch_method_name;
}
function __get_border_sc_rate($border_data)
{
    $wk_border_sc_rate='-';
    if(isset($border_data['border_sc_rate']) and $border_data['border_sc_rate']!==''){
        if($border_data['cen_not_linkage_flg']!=='1'){
            $wk_border_sc_rate=$border_data['border_sc_rate']."%";
        }
    }
    return $wk_border_sc_rate;
}

function  __get_rank_ss($border_data)
{
    $wk_rank_ss='-';
    if($border_data['sec_not_linkage_flg']=="1"){
        $border_data='-';
    }else if(!isset($border_data['rank_ss'])){
        $wk_rank_ss='-';
    }else if($border_data['rank_ss']!=30.0){
        $wk_rank_ss=$border_data['rank_ss'];
    }else{
        $wk_rank_ss='BF';
    }

    return $wk_rank_ss;
}
