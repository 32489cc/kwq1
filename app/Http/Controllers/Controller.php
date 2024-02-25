<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $viewdata=[];
    protected function set_breadcrumb($breadcrumbs=array())
    {
        $html='';
        $count=count($breadcrumbs);
        if(is_array($breadcrumbs) && $count>0){
            $html = ' <nav aria-label="breadcrumb">';
            $html.='<ol class="breadcrumb">';
            $html.='<li class="breadcrumb-item"><a href="your_home_page_url">大学主页</a></li>';
            foreach ($breadcrumbs as $k=>$v) {
                $html .= '<li href="' . $v . '" class="breadcrumb-item active" aria-current="page">' . $k . '</li>';
            }
            $html.='</ol>';
            $html.='</nav>';
            $this->viewdata['breadcrumb']=$html;
        }

    }
}
