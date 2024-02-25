<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubModel extends Model
{
    use HasFactory;
    protected $table='ma_sub';
    protected $primaryKey='univ_dep_sub_cd';
    public function ma_dep()
    {
        return $this->belongsTo(DepModel::class,'univ_dep_cd');
    }
    public static function get_univ_dep_sub($univ_cd4)
    {
        $results= DB::table('ma_sub')->select('ma_sub.univ_cd4',
            'ma_sub.dep_cd','ma_sub.sub_cd','ma_sub.univ_dep_cd','ma_sub.sub_cd_name','ma_sub.univ_dep_sub_cd','ma_dep.dep_cd_name')
            ->leftJoin('ma_dep','ma_sub.univ_dep_cd','=','ma_dep.univ_dep_cd')
            ->get();

       return $arrayResults = $results->map(function ($item) {
            return (array) $item;
        })->toArray();
    }

}
