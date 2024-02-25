<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleListModel extends Model
{
    use HasFactory;
    protected $table='tb_bbs_info';
    public const CREATED_AT ='create_time';
    public const UPDATED_AT = 'delete_time';
    protected $primaryKey='contribution_id';
    public $incrementing=true;
    private function convert_keywords_to_search_condition_array($keywords)
    {
        $keyword=convert_large_space_to_small_space($keywords);

        $conditions=preg_split('/\s+/',$keyword,-1,PREG_SPLIT_NO_EMPTY);

        return $conditions;
    }
    public  function get_bbs_info_count($univ_cd4='',$target_group_cd='',$target_keywords='')
    {
     $keywords=$this->convert_keywords_to_search_condition_array($target_keywords);
     $belong_name_condition=$keywords;
     $crt_name_condition=$keywords;
     $title_condition=$keywords;
     $text_condition=$keywords;
     $query=ArticleListModel::query();

         $query->where(function ($subQuery) use($keywords){
             for($i=0;$i<count($keywords);$i++) {
                 if ($i == 0) {
                     $subQuery->whereRaw("convert(belong_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                         ->orWhereRaw("convert(cr_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                         ->orWhereRaw("convert(title using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                         ->orWhereRaw("convert(text using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"]);

                 } else {
                     $subQuery->orWhereRaw("convert(belong_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                         ->orWhereRaw("convert(cr_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                         ->orWhereRaw("convert(title using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                         ->orWhereRaw("convert(text using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"]);
                 }
             }
         });
         $query->where('univ_cd4',$univ_cd4);
         if(config('constants.GROUP_CD_ALL')!==$target_group_cd){
             $query->where('group_cd',$target_group_cd);
         }

         $result=$query->count();

         return $result;
    }

    public  function get_bbs_info_list($univ_cd4='',$target_group_cd=0,$target_keywords='',$max_row=10)
    {
        $keywords=$this->convert_keywords_to_search_condition_array($target_keywords);
        $belong_name_condition=$keywords;
        $crt_name_condition=$keywords;
        $title_condition=$keywords;
        $text_condition=$keywords;
        $query=ArticleListModel::query();

        $query->where(function ($subQuery) use($keywords){
            for($i=0;$i<count($keywords);$i++) {
                if ($i == 0) {
                    $subQuery->whereRaw("convert(belong_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                        ->orWhereRaw("convert(cr_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                        ->orWhereRaw("convert(title using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                        ->orWhereRaw("convert(text using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"]);

                } else {
                    $subQuery->orWhereRaw("convert(belong_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                        ->orWhereRaw("convert(cr_name using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                        ->orWhereRaw("convert(title using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"])
                        ->orWhereRaw("convert(text using utf8) collate utf8_unicode_ci like ?", ["%{$keywords[$i]}%"]);
                }
            }
        });
        $query->where('univ_cd4',$univ_cd4);
        if(config('constants.GROUP_CD_ALL')!==$target_group_cd){
            $query->where('group_cd',$target_group_cd);
        }

        $result=$query->orderBy('create_date')->paginate(10)->onEachside(2);

        return $result;
    }

}
