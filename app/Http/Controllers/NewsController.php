<?php

namespace App\Http\Controllers;

use App\News;
use Validator;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show', 'feed']);
    }


    public function feed() {
        $view = view('feed', [
            'news' => News::latest()->where('published', 1)->limit(10)->get()
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
        return view('news.index', [
            'news' => News::with('categories')->where('published', 1)->latest()->simplePaginate(5)
        ]);
    }

    public function index_unpublished() {
        return view('news.index_unpublished', [
            'news' => News::with('categories')->where('published', 0)->latest()->simplePaginate(10)
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
            'pretty_url' => 'required|min:2|max:255',
            'body' => 'required|min:2',
        ]);

        if ($valid->fails()) {
            return redirect('news/create')->withErrors($valid)->withInput();
        }

        $post = new News();
        $post->title = $request->title;
        $post->pretty_url = $request->pretty_url;
        $post->body = $request->body;
        $post->published = isset($request->published);
        $post->user_id = 1;
        $post->save();

        $this->save_tags($request, $post);

        // Redirect to home.
        return redirect('/');
    }

    private function save_tags(Request $request, News $post) {
        if (empty($request->tags)) {
            // Remove all tags from this post (if any).
            $post->categories()->detach();
            return;
        }

        // Request has tags.
        // Format tags.
        $request_tags = explode(',', $request->tags);
        $tags = [];
        foreach ($request_tags as $key => $tag) {
            $tag = trim($tag);
            if ($tag == '') {
                // Empty tag.
                continue;
            }

            $tags[] = trim($tag);
        }

        // Delete tags in DB that are not in the request.
        // Get tags that are not in the request.
        $delete_tags = array_diff($post->categories()->pluck('title')->all(), $tags);
        $new_tags = array_diff($tags, $post->categories()->pluck('title')->all());

        // Delete removed tags.
        foreach ($delete_tags as $tag) {
            $tag_model = \App\Categories::where('title', $tag)->first();
            $post->categories()->detach($tag_model);
        }

        // Save tags not already saved.
        foreach ($new_tags as $tag) {
            $tag_model = \App\Categories::firstOrCreate([
                'title' => $tag
            ]);

            // Attach the tag to the post.
            $post->categories()->attach($tag_model);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', [
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
        return view('news.edit', [
            'news' => $news
        ]);
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
        $news->title = $request->title;
        $news->body = $request->body;
        $news->published = isset($request->published);
        $news->save();

        $this->save_tags($request, $news);

        return redirect()->route('home');
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
