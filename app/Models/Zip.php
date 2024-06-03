<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Zip extends Model
{
    use HasFactory;

    public function search_address($search)
    {
      $condition=self::create_zip_condition($search);
      $query=null;
      $query.="SELECT ";
      $query.="zip_code,";
      $query.="CONCAT(SUBSTRING(zip_code,1,3),'-',SUBSTRING(zip_code,4,4)) as view_zip_code,";
      $query.="prefecture_name,";
      $query.="city_name,";
      $query.="town_name";
      $query.=" FROM zip";

      $bind=null;
      $where_str=null;
      if(count($condition)>0){
          $bind=$condition['bind'];
          $where_str=" WHERE " .implode(" AND ", $condition['where']);
      }

      $query.=$where_str;
      $query.=" ORDER BY zip_code";

      $result=DB::select($query,$bind);
      return $result;
    }

    private function create_zip_condition($condition)
    {
        $zip_condition=array();
        if(isset($condition['zip_code'])){
            $zip_condition['bind'][]=mb_ereg_replace("[^0-9]","",$condition['zip_code']);
            $zip_condition['where'][]='zip_code= ?';
        }
        if(isset($condition['address'])){
            $zip_condition['bind'][]='%'.$condition['address'].'%';
            $zip_condition['where'][]='CONCAT(IFNULL(prefecture_name,""),IFNULL(city_name,""),IFNULL(town_name,"")) LIKE ?';
        }

        return $zip_condition;
    }
}
