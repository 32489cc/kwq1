<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/search/university',[\App\Http\Controllers\University::class,'index'])->name('searchUniversity');
Route::get('{univ_cd4}/outline/scholarship',[\App\Http\Controllers\Scholarship::class,'index'])->name('scholarship');
Route::get('{univ_cd4}/general/exam_result',[\App\Http\Controllers\ExamResult::class,'index']);
Route::post('general/exam_result/exam_dep_sub_result',[\App\Http\Controllers\ExamResult::class,'exam_dep_sub_result']);
//bba
Route::get('{univ_cd4}/bbs/list',[\App\Http\Controllers\Article::class,'index']);
Route::get('{univ_cd4}/bbs/article_entry',[\App\Http\Controllers\ArticleEntry::class,'index'])->name('article_entry');
Route::post('{univ_cd4}/bbs/search',[\App\Http\Controllers\Article::class,'search'])->name('bbs_search');
Route::get('{univ_cd4}/outline/subject',[\App\Http\Controllers\DepSubController::class,'index']);
Route::get('search/index',[\App\Http\Controllers\SearchController::class,'index']);
Route::get('{univ_cd4}/open_campus',[\App\Http\Controllers\OpenCampus::class,'index']);
Route::get('{univ_cd4}/general/border_rate',[\App\Http\Controllers\BorderRate::class,'index']);
Route::get('{univ_cd4}/recommend',[\App\Http\Controllers\RecommendExam::class,'index']);
//推薦
Route::get('{univ_cd4}/recommend/exam_rec/download_xml_print',[\App\Http\Controllers\RecommendExam::class,'download_xmlss_print']);
Route::get('recommend/exam_rec/execute_download_xmlss_print',[\App\Http\Controllers\RecommendExam::class,'execute_download_xmls_print']);
//入試変更点
Route::get('{univ_cd4}/general/exam_change',[\App\Http\Controllers\ExamChange::class,'index']);
//预约功能测试
Route::get('test/appointment',[\App\Http\Controllers\AppointmentController::class,'index'])->name('test');
Route::post('post/test/appointment',[\App\Http\Controllers\AppointmentController::class,'register'])->name('register');
//
Route::get('search/map',[\App\Http\Controllers\MapController::class,'index']);

//status
Route::get('/usage/status',[\App\Http\Controllers\Usage::class,'index'])->name('get_insured_no');
Route::post('/usage/status',[\App\Http\Controllers\Usage::class,'index'])->name('post_insured_no');
