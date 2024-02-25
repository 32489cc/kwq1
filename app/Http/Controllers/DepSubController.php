<?php

namespace App\Http\Controllers;

use App\Models\DepModel;
use App\Models\SubModel;
use Illuminate\Http\Request;

class DepSubController extends Controller
{
    const PAGE_VIEW='outline.subject';

    public function index($univ_cd4)
    {
        $data=SubModel::get_univ_dep_sub($univ_cd4);

        $this->crate_connection_list($data);
        $this->viewdata['sub_list']=$data;
        return view(self::PAGE_VIEW,['viewdata'=>$this->viewdata]);
    }
    private function crate_connection_list($data)
    {
     $counter=0;

     $connect_list=array();
     for ($i=0;$i<count($data);$i++){
         if($i===0){
             $dep_name_store=$data[0]['dep_cd_name'];
         }
         if($data[$i]['dep_cd_name']===$dep_name_store){
             $counter++;
         }else{
             $connect_list[]=$counter;
             $dep_name_store=$data[$i]['dep_cd_name'];
             $counter=1;
         }
     }
     $connect_list[]=$counter;

     $this->viewdata['connect_list']=$connect_list;
    }
}
