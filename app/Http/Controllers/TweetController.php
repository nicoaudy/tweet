<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function index(Request $request, Tweet $tweet)
    {
        $allTweets = $tweet->whereIn(
            'user_id',
            $request->user()->following()->pluck('users.id') // get user where following me
            ->push($request->user()->id)) // and get own tweet
            ->with('user');  // eager loading

        $tweets = $allTweets->orderBy('created_at', 'desc')->take($request->get('limit', 20))->get();

        return response()->json([
            'tweets'    => $tweets,
            'total'     => $tweets->count(),
        ]);
    }

    public function create(Request $request, Tweet $tweet)
    {
        $this->validate($request, [
            'body'  => 'required|max:140'
        ]);

        $createdTweet = $request->user()->tweets()->create([
            'body'  => $request->body
        ]);

        return response()->json($tweet->with('user')->find($createdTweet->id));
    }
}
