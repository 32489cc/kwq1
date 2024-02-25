<?php
function edit_rec_data($rec_ao_data,$type='univ')
{
    $disp_array=[];
    foreach ($rec_ao_data as $data_row){
        $tmp_disp_array=[];
        //そのまま移送の項目
        $tmp_disp_array=array_merge($tmp_disp_array,array('the_year'=>$data_row['the_year']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('univ_cd4'=>$data_row['univ_cd4']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('univ_typ'=>$data_row['univ_typ']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('univ_atena'=>$data_row['univ_atena']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('data_kbn'=>$data_row['data_kbn']=='1'?"推薦型":"総合型"));
        $tmp_disp_array=array_merge($tmp_disp_array,array('univ_dep_sub_cd'=>$data_row['univ_dep_sub_cd']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('dep_name'=>$data_row['the_year']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('sub_name'=>$data_row['the_year']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('selection_name'=>$data_row['the_year']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('course'=>$data_row['the_year']));
        $tmp_disp_array=array_merge($tmp_disp_array,array('uniq_cd'=>$data_row['uniq_cd']));

        $tmp=[];
        if(!empty($data_row['dep_name'])){
            $tmp[]=$data_row['dep_name'].$data_row['dep_typ'];
        }
        if(!empty($data_row['sub_name'])){
            $tmp[]=$data_row['sub_name'].$data_row['sub_typ_name'];
        }
        if(!empty($data_row['course'])){
            $tmp[]=$data_row['course'];
        }
        $tmp_disp_array=array_merge($tmp_disp_array,array('dep_sub_course'=>implode('/',$tmp)));

        $disp_boshu_capa='';
        if($type=='univ'){
            $disp_boshu_capa="(".$data_row['boshu_capa'].")";
        }else if($type=='excel'){
            $disp_boshu_capa=$data_row['boshu_capa'];
        }
        $tmp_disp_array=array_merge($tmp_disp_array,array('disp_boshu_capa'=>$disp_boshu_capa));

        //出願要件
        set_shutugan($data_row,$tmp_disp_array,$type);

        array_push($disp_array,$tmp_disp_array);
    }
    return $disp_array;
}
function set_shutugan($data_row,&$tmp_disp_array,$type='univ')
{
    //出願項目
    $tmp_shutugan_select=array(
        'apl_place_cond',
        'apl_selection_activities',
        'apl_course_cond',
        'apl_licence',
        'apl_number_cond',
        'apl_graduate_cond',
        'apl_other'
    );
    $shutugan_arr=[];
    //専願・併願
    $disp_early_regular_typ="-";
    switch ($data_row['apl_early_regular_typ']){
        case '1':
            $disp_early_regular_typ="専願";
            break;
        case '2':
            $disp_early_regular_typ="併願";
            break;
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_early_regular_type'=>$disp_early_regular_typ));

    //現浪
    $disp_graduate_type='-';
    switch ($data_row['apl_graduate_typ']){
        case '0':
            $disp_graduate_type="現役";
            break;
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
            $disp_graduate_type="卒後".$data_row['apl_graduate_typ']."年";
            break;
        case '9':
            $disp_graduate_type="卒後".$data_row['apl_graduate_typ']."年以上";
            break;
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_graduate_typ'=>$disp_graduate_type));

    //評定・概評
    $disp_apl_rating="";
    if(!empty($data_row['apl_rating'])){
        $disp_apl_rating=sprintf("%.1f",$data_row['apl_rating']);
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_apl_rating'=>$disp_apl_rating));

    $disp_search_other="";
    //学科条件
    $val="";
    if(!empty($data_row['apl_sub_cond'])){
        $val="有";
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_apl_sub_cond'=>$val));

    //女子のみ
    $val="";
    if(!empty($data_row['apl_sub_cond'])){
        $val="女子のみ";
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_apl_gender'=>$val));

    //出願項目選択有
    $select="";
//    if($type=='univ'){
//        $select=
//    }else{
//        $select=
//    }
   //出願要件詳細
    if(!empty($data_row['apl_detail'])){
        $disp_apl_detail=$data_row['apl_detail'];
    }else{
        $disp_apl_detail="";
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_apl_detail'=>$disp_apl_detail));

    //出願書類
    $doc_arr=array();
    if(!empty($data_row['apl_document_report'])){
        $doc_arr[]='調査書';
    }
    if(!empty($data_row['apl_document_recommend'])){
        $doc_arr[]='推薦書';
    }
    if(!empty($data_row['apl_document_aspiration'])){
        $doc_arr[]='志望理由書';
    }
    if(!empty($data_row['apl_document_other'])){
        $doc_arr[]='活動報告書';
    }
    $shutugan_arr=array_merge($shutugan_arr,array('disp_apl_document'=>implode(',',$doc_arr)));
    $tmp_disp_array=array_merge($tmp_disp_array,array('shutugan'=>$shutugan_arr));
}

function set_senkou($data_row,&$tmp_disp_array,$type)
{
    $jis_arr=[];
    $is_senkou_flg=false;
    foreach (array('selection_1','selection_2','selection_3') as $ji){
        $is_ji_flg=false;
        $js_arr=[];
        $js_arr['disp_total_point']="";
        if(!empty($data_row[$ji.'total_point'])){
            $disp_total_point=$data_row[$ji.'total_point'];
            $js_arr['disp_total_point']=$disp_total_point;
        }

        $items=array(
            'inteview'=>'',
            'essay'=>'',
            'comprehensive'=>'',
            'presentation'=>'',
            'subject'=>'',
            'appropriate'=>'',
            'document'=>'',
            'licence'=>'',
            'other'=>'',
            'common'=>''
        );

        $item_arr_nes=array();
        $item_arr_sel1=array();
        $item_arr_sel2=array();
        $item_arr_sel3=array();

        foreach ($items as $key=>$item){
            $point="";
            if($type=="univ"){
                if($data_row[$ji.$key."_point"]!=""){
                    $point="(".$data_row[$ji.$key."_point"].")";
                }
            }

            switch ($data_row[$ji.$key."_symbol"]){
                case 'H':
                    $item_arr_nes[]=$item.$point;
                    break;
                case '1':
                    $item_arr_sel1[]=$item.$point;
                    break;
                case  '2':
                    $item_arr_sel2[]=$item.$point;
                    break;
                case '3':
                    $item_arr_sel3[]=$item.$point;
                    break;
            }
            $item_arr=array();
            if(count($item_arr_nes)>0){
                $item_arr[]=implode(",",$item_arr_nes);
            }
            if(count($item_arr_sel1)>0){
                $item_arr[]=implode("または",$item_arr_sel1);
            }
            if(count($item_arr_sel2)>0){
                $item_arr[]=implode("または",$item_arr_sel2);
            }
            if(count($item_arr_sel3)>0){
                $item_arr[]=implode("または",$item_arr_sel3);
            }
            $ji_arr['disp_item']="";
            if(count($item_arr)>0){
                $ji_arr['disp_item']=implode(',',$item_arr);
                $is_ji_flg=true;
            }

            $note="";
            if(!empty($data_row[$ji.'note'])){
                $note=$data_row[$ji.'note'];
                $is_ji_flg=true;
            }
            $ji_arr['disp_note']=$note;
            $ji_arr['is_ji_flg']=$is_ji_flg;
            if($is_ji_flg){
                $is_senkou_flg=true;
            }
            $jis_arr[]=$ji_arr;
        }

        $tmp_disp_search_selection=array(
            'selection_1_common',
            'selection_2_common',
            'selection_3_common',
        );
        foreach ($tmp_disp_search_selection as $item){
            $data_row['disp_search_'.$item]="";
            if(empty($data_row[$item.'_symbol'])){
                $tmp_data['disp_search_'.$item]="";
            }elseif($data_row[$item.'_symbol']=='H'){
                $tmp_data['disp_search_'.$item]="必須";
            }else{
                $tmp_data['disp_search_'.$item]="選択";
            }
        }
        $tmp_disp_array=array_merge($tmp_disp_array,array('disp_search_common'=>$tmp_data));
        $tmp_disp_array=array_merge($tmp_disp_array,array('senkou'=>$jis_arr));
        $tmp_disp_array=array_merge($tmp_disp_array,array('is_senkou_flg'=>$is_senkou_flg));
    }
}
