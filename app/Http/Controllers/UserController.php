<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Watchlist;
use App\Review;
use App\Comment;
use TCG\Voyager\Http\Controllers;
use TCG\Voyager\Facades\Voyager as Voyager;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $browse_reviews = $request->user()->hasPermission('browse_reviews');
        $browse_comments = $request->user()->hasPermission('browse_comments');
        $user_id = $request->user()->id;
        $user_name = $request->user()->name;
        $watchlists = Watchlist::where('user_id', $user_id)->get();
        $reviews = Cache::remember('reviews' . $user_id, 36000, function () use ($user_id) {
            return Review::where('user_id', $user_id)->get();
        });
        $comments = Cache::remember('comments' . $user_id, 36000, function () use ($user_id) {
            return Comment::where('user_id', $user_id)->get();
        });

        if($browse_reviews) {
            $pending_review_count = sizeof(Review::where('approved', 0)->get());
            $pending_comment_count = sizeof(Comment::where('approved', 0)->get());
        } else {
            $pending_review_count = null;
            $pending_comment_count = null;
        }

        return view('users.dashboard', [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'watchlists' => $watchlists,
            'reviews' => $reviews,
            'comments' => $comments,
            'administrate_reviews' => $browse_reviews,
            'administrate_comments' => $browse_comments,
            'pending_reviews' => $pending_review_count,
            'pending_comments' => $pending_comment_count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
