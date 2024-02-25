<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleEntry extends Controller
{
    public function index()
    {
        return view('bbs.article_entry');
    }
    public function register(Request $request)
    {
        $data=[
            'name'=>$request->input(''),
        ];
          $validator=  $this->__validate($data);
          if($validator->fails()){

          }
    }
//    private function __validate($data)
//    {
//        $rule=[
//            ''=>,
//            ''=>,
//        ];
//            $message=[
//                ''=>,
//            ];
//                $validator=Validator::make($data,$rule,$message);
//        $validator->sometimes('','',function ($input){
//
//        });
//        return $validator;
//    }
}
