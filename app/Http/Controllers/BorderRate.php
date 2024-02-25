<?php

namespace App\Http\Controllers;

use App\Models\BorderRateModel;
use Illuminate\Http\Request;

class BorderRate extends Controller
{
    const PAGE_VIEW='general.border_rate';
    const SCH_METHOD_NAME_IPPAN='一般';
    const SCH_METHOD_NAME_CENTER='一般';
    const SCH_METHOD_NAME_SHORT='一般';
    private $prm_univ_cd4='';

    public function index($univ_cd4= '')
    {
$this->prm_univ_cd4=$univ_cd4;
        $this->viewdata['univ_cd4']=$univ_cd4;
        $this->edit_border_rate($univ_cd4);
        $this->edit_breadbrums();
        return view(self::PAGE_VIEW,['viewdata'=>$this->viewdata]);
    }

    protected function edit_border_rate($univ_cd4)
    {
        $border_info_list=BorderRateModel::get_border_rate_list($univ_cd4);
        if(count($border_info_list)===0){
            $error_message='error';
            $this->viewdata['msg_nodata']=$error_message;
            return;
        }
       $border_info_list=edit_border_rate_info($border_info_list);

        $this->viewdata['border_info_list']=$border_info_list;

    }
    private function edit_breadbrums()
    {
        $breadbrums=[
            '偏差値'=>$this->prm_univ_cd4.'/general/border_rate'
        ];
        $this->set_breadcrumb($breadbrums);
    }
}
