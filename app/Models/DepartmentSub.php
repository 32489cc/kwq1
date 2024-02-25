<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentSub extends Model
{
    use HasFactory;
    protected $table='ma_department_name_list';

    public static function get_dep_sub_list($univ_cd4)
    {
        return DepartmentSub::query()->where('univ_cd4',$univ_cd4)->orderBy('reg_cd10')
            ->get()->toArray();
    }
}
