<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;
    protected $table='ma_appointment';
    public $timestamps = false;
    protected $fillable=[
        'username',
        'email',
        'appointment_time',
        'comment',
        'send_flg'
    ];

    public static function insert_data($array)
    {
        AppointmentModel::query()->create([
            'username'=>$array['username'],
            'email'=>$array['email'],
            'appointment_time'=>$array['appointment_time'],
            'comment'=>$array['comment']
        ]);
        return true;
    }
}
