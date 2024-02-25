<?php

namespace App\Http\Controllers;

use App\Models\AppointmentModel;
use App\Rules\TimeCompare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('test.index');
    }
    public function register(Request $request)
    {
      $data=[
          'username'=>$request->input('username'),
          'email'=>$request->input('email'),
          'appointment_time'=>$request->input('appointment_time'),
          'comment'=>$request->input('comment')
      ];
        $validator=  $this->__validate($data);

       if($validator->fails()){
           return redirect()->route('test')

               ->withErrors($validator)
//               withErrors是把错误信息储存到$errors的变量里面
               ->withInput();
       }
        AppointmentModel::insert_data($data);
        return redirect()->route('test');
    }

    private function __validate($data)
    {
        $rules = [
            'username' => 'required|min:3|max:50',
            'email' => 'required|email',
            'appointment_time' => ['required','date',new TimeCompare]
        ];

        $messages = [
            'username.required' => 'Username is required.',
            'username.min' => 'Username must be at least 3 characters.',
            'username.max' => 'Username may not be greater than 50 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'appointment_time.required' => 'Appointment time is required.',
            'appointment_time.date' => 'Please provide a valid date for the appointment.'
        ];

        $validator=Validator::make($data,$rules,$messages);
        return $validator;
    }
}
