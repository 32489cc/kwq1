<?php

namespace App\Http\Controllers;

use App\Models\ArticleListModel;
use Illuminate\Http\Request;

class Article extends Controller
{
    const PAGE_VIEW='bbs.article_list';
    private $prm_univ_cd4='';
    public function index(Request $request,$univ_cd4='')
    {
        //max_row
        $max_row=config('constants.MAX_CNT_BBS');
        $this->prm_univ_cd4=$univ_cd4;
        //遷移元設定
        if(isset($_SERVER['HTTP_REFERER'])){
            $referer_url=strstr($_SERVER['HTTP_REFERER'],"/");
        }else{
            $referer_url='';
        }
        $article_entry_url=config('constants.ARTICLE_ENTRY_REFERER_URL');
        $article_list_search_url=config('constans.ARTICLE_LIST_SEARCH_REFERER_URL');
        //新規投稿画面、検索実行時は検索条件をセッションから取る
        $last_tr_group_selected='';
        $last_keyword='';
        $last_page='';
        $isFromMyPage=FALSE;
        $isFromOtherArticlePage=FALSE;

        if(preg_match('/'.str_replace('/','¥/',$article_list_search_url).'/',$referer_url)||$referer_url==''){
            $last_tr_group_selected=$request->session()->get('last_tr_group_selected');
            $last_keyword=$request->session()->get('last_keywords');
            $last_page=$request->session()->get('last_page');
            if(preg_match('/'.str_replace('/','¥/',$article_list_search_url).'/',$referer_url)){
                $isFromMyPage=TRUE;
            }else{
                $isFromOtherArticlePage=TRUE;
            }
        }else{
            $request->session()->forget('last_tr_group_selected');
            $request->session()->forget('last_keywords');
            $request->session()->forget('last_page');
        }
        //分類設定
        $target_group_cd=$last_tr_group_selected;
        if(empty($target_group_cd)){
            $target_group_cd=config('constants.GROUP_CD_ALL');
        }
        $target_keywords=$last_keyword;

        $target_page=1;
        //投稿一覧取る
        $article_list=app(ArticleListModel::class);
        $bbs_info_count=$article_list->get_bbs_info_count($this->prm_univ_cd4,$target_group_cd,$target_keywords);

        $bbs_info_list=$article_list->get_bbs_info_list($univ_cd4,$target_group_cd,$target_keywords,$max_row);
        //pagination

        $this->viewdata['bbs_info_count']=$bbs_info_count;
        $this->viewdata['bbs_info_list']=$bbs_info_list;
        return view(self::PAGE_VIEW,['viewdata'=>$this->viewdata]);
    }


    public function search(Request $request,$univ_cd4='')
    {
        if(!$request->isMethod('post')){
            return redirect('/'.$univ_cd4.'/bbs.list');
        }
        $group_cd=$request->input('pul_group');
        $keywords=$request->input('txt_keyword');
        if($this->is_error($keywords)=== true){
            session()->flash('error_message','キーワードnot found');
        }else{
            $request->session()->put('last_tr_group_selected',$group_cd);
            $request->session()->put('last_keywords',$keywords);
            $request->session()->put('last_page',1);
        }

       return redirect('/'.$univ_cd4.'/bbs/list');
    }

    private function is_error($keywords)
    {
        $keywords_length=mb_strlen($keywords);
        if((int)$keywords_length>400){
            return true;
        }
        return  false;
    }


}
