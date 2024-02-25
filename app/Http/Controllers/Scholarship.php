<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScholarshipModel;
use App\Models\UnivModel;

class Scholarship extends Controller
{
    const PAGE_VIEW='outline.scholarship';
    private $prm_univ_cd4= '';

    public function __construct()
    {

    }

    public function index($univ_cd4='')
    {
      $this->prm_univ_cd4=$univ_cd4;
      $this->common_control();
      return view(self::PAGE_VIEW,['viewdata'=>$this->viewdata]);
    }
    private function common_control()
    {
        $query=UnivModel::get_ma_univ($this->prm_univ_cd4);
        $this->viewdata['univ_name']=$query['univ_name'];

    }
}
