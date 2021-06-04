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
        // $auth_user_id=Auth::id();
        // $start_date=$request->start_date;
        // $end_date=$request->end_date;

        // $auth_user_articles = DB::table('articles')
        //     ->where('user_id','=',$auth_user_id)
        //     ->orderBy('post_date', 'desc')
        //     ->paginate(10);
        // return view('articles.index',compact('auth_user_articles','start_date','end_date'));

        // 2weeks ago from today


        // label data


        // before and after feeling score
        $auth_user_id = Auth::id();

        $articles = DB::table('articles')
            ->where('user_id', '=', $auth_user_id)
            ->orderBy('post_date', 'desc')
            ->limit(14)
            ->get();


        foreach ($articles as $article) {
            $dates[] = $article->post_date;
            $before_scores[] = $article->feeling_before;
            $after_scores[] = $article->feeling_after;
        }

        $reverse_dates = array_reverse($dates);
        $reverse_before_scores = array_reverse($before_scores);
        $reverse_after_scores = array_reverse($after_scores);

        return view('motivation.index', compact('articles', 'reverse_dates', 'reverse_before_scores', 'reverse_after_scores'));
    }
}
