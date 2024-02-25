<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class
ExamChangesModel extends Model
{
    use HasFactory;
    protected $table='tb_chg_pt';

    public  static function get_chg_pt($univ_cd4,$the_year)
    {
        return ExamChangesModel::query()->where('univ_cd4',$univ_cd4)->where('the_year',$the_year)
            ->get()->toArray();
    }
}
