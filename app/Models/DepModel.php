<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepModel extends Model
{
    use HasFactory;
    protected $table='ma_dep';
   protected $primaryKey='univ_dep_cd';
    public function ma_sub()
    {
        return $this->hasMany(SubModel::class,'univ_dep_cd');
    }

}
