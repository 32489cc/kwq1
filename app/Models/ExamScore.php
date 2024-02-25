<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    use HasFactory;
    protected $table='exam_score';

    public static function get_dep_sub_list($univ_cd4,$dep_cd,$sub_cd)
    {
        return ExamScore::query()->where('univ_cd4',$univ_cd4)
            ->where('dep_cd',$dep_cd)
            ->where('sub_cd',$sub_cd)
            ->get()
            ->toArray();
    }
}
