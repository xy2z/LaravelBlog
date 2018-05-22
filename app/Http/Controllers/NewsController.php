<?php

namespace App\Http\Controllers;

use App\News;
use Validator;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function feed() {
        $view = view('feed', [
            'news' => News::latest()->limit(2)->get()
        ]);
        return response($view)->header('Content-Type', 'application/rss+xml');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news_index', [
            'news' => News::latest()->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255',
            'body' => 'required|min:2'
        ]);

        if ($valid->fails()) {
            return redirect('news/create')->withErrors($valid)->withInput();
        }

        $new = new News();
        $new->title = $request->title;
        $new->body = $request->body;
        $new->user_id = 1;
        $new->save();

        // Redirect to home.
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news_item', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
