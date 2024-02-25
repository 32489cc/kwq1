<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapsModel extends Model
{
    use HasFactory;
    protected $table='ma_univ_acs';

    public static function get_univ_list()
    {
        return MapsModel::query()->leftJoin('ma_univ','ma_univ_acs.univ_cd4','=','ma_univ.univ_cd4')
            ->get(['ma_univ.univ_typ','ma_univ.univ_atena','ma_univ_acs.*'])->toArray();
    }
}
