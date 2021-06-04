<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MotivationController extends Controller
{
    //
    public function index()
    {
        // 2weeks ago from today
        // label date
        // before and after feeling score
        $auth_user_id = Auth::id();
        $articles = DB::table('articles')
            ->where('user_id', '=', $auth_user_id)
            ->orderBy('post_date', 'desc')
            ->limit(14)
            ->get();

        // DBから取得した状態だとcart.jsに渡すときに逆順になってしまう
        foreach ($articles as $article) {
            $dates[] = $article->post_date;
            $before_scores[] = $article->feeling_before;
            $after_scores[] = $article->feeling_after;
        }

        // 投稿データがない場合は非表示の処理
        if (isset($dates)) {
            $reverse_dates = array_reverse($dates);
            $reverse_before_scores = array_reverse($before_scores);
            $reverse_after_scores = array_reverse($after_scores);
            return view('motivation.index', compact('articles', 'reverse_dates', 'reverse_before_scores', 'reverse_after_scores'));
        } else {
            return view('motivation.nodata');
        }
    }
}
