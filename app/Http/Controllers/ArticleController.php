<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $auth_user_id=Auth::id();
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        
        if(!empty($start_date)){
            $auth_user_articles=DB::table('articles')
            ->where('user_id', '=', $auth_user_id)
            ->whereDate('post_date', '>=', $start_date)
                ->whereDate('post_date', '<=', $end_date)
                ->paginate(10);
            return view('articles.index',compact('auth_user_articles','start_date','end_date'));
        }

        $auth_user_articles = DB::table('articles')
            ->where('user_id','=',$auth_user_id)
            ->orderBy('post_date', 'desc')
            ->paginate(10);
        return view('articles.index',compact('auth_user_articles','start_date','end_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create_post_date=$request->only(
            'post_date','title','feeling_before','feeling_after','post_content'
        );
        
        $auth_user_id=Auth::id();
        $create_post_date=array_merge($create_post_date,['user_id'=>$auth_user_id]);
        DB::table('articles')
            ->insert($create_post_date);
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.details',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $edit_post_date = $request->only(
            'user_id','post_date','title','feeling_before','feeling_after','post_content'
        );
        DB::table('articles')
            ->where('id','=',$article->id)
            ->update($edit_post_date);
            return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        DB::table('articles')->where('id', '=', $article->id)->delete();
        return redirect('/articles');
    }

    public function search(Request $request)
    {
        $auth_user_id=Auth::id();
        $start_date=$request->start_date;
        $end_date=$request->end_date;
    
        $search_articles=DB::table('articles')
            ->where('user_id', '=', $auth_user_id)
            ->whereDate('post_date', '>=', $start_date)
            ->whereDate('post_date', '<=', $end_date)
            ->paginate(10);

        dd($search_articles);
        return view('articles.search',compact('search_articles'));

    }

}
