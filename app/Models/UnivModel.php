<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Eloquent
 */
class UnivModel extends Model
{
    use HasFactory;
    protected $table='ma_univ';
    public $timestamps = false;
    protected $fillable=[
        'univ_typ',
        'univ_cd4',
        'univ_name',
        'univ_typ_name',
        'univ_kana',
        'univ_atena',
        'univ_chg_typ',
        'establish_y'
    ];

    public static function get_ma_univ($univ_cd4)
    {
        return UnivModel::query()->where('univ_cd4',$univ_cd4)->first();
    }
    public static function get_univ_name($univ_cd4)
    {
        return UnivModel::query()->where('univ_cd4',$univ_cd4)->first()->select('univ_name');
    }
    public static function insert_univ($array)
    {
        return UnivModel::query()->create([
                'univ_typ'=>$array['univ_typ'],
                'univ_cd4'=>$array['univ_cd4'],
                'univ_name'=>$array['univ_name'],
                'univ_typ_name'=>$array['univ_typ_name'],
                'univ_kana'=>$array['univ_kana'],
                'univ_atena'=>$array['univ_atena'],
                'univ_chg_typ'=>$array['univ_chg_typ'],
                'establish_y'=>$array['establish_y']
        ]);
    }
}
