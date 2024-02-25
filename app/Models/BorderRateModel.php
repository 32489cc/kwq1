<?php

namespace App\Models;

use App\Http\Controllers\BorderRate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorderRateModel extends Model
{
    use HasFactory;
    protected $table='ma_rank_ss';

    public static function get_border_rate_list($univ_cd4='')
    {
        return BorderRateModel::query()->where('univ_cd4',$univ_cd4)->get()->toArray();
    }
}
