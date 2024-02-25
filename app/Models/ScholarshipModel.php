<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ScholarshipModel extends Model
{
    use HasFactory;
    protected $table='tb_scholarship';

    public  function get_tb_scholarship($univ_cd4)
    {
        return DB::table('tb_scholarship')->where('univ_cd4',$univ_cd4)->get();

    }
}
