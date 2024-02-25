<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendModel extends Model
{
    use HasFactory;

    public static function get_recommend_search_result($univ_cd4)
    {
        return 1;
    }
}
