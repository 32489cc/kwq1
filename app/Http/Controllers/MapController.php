<?php

namespace App\Http\Controllers;

use App\Models\MapsModel;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $res=MapsModel::get_univ_list();

        $univ_list_json=json_encode($res);

        $this->viewdata['univ_list']=$univ_list_json;
        return view('search.map',['viewdata'=>$this->viewdata]);
    }
}
