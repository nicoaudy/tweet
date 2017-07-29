<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
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
