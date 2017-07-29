@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="timeline">
        <div class="col-md-4">
            <form action="#" v-on:submit="postTweet">
                <div class="form-group">
                    <textarea rows="5" v-model="tweet.body" class="form-control" placeholder="What are you upto?" maxlength="140" required></textarea> <br>
                    <input type="submit" value="Tweet" class="form-control">
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <p v-if="!tweets.length">No tweets to see here yet. Follow someone and make it happen.</p>
            <div class="tweets" v-if="tweets.length">
                <div class="media" v-for="tweet in tweets" track-by="id">
                    <div class="media-left">
                        <img v-bind:src="tweet.user.avatar" class="media-object">
                    </div>
                    <div class="media-body">
                        <div class="user">
                            <a href=""><strong>@{{ tweet.user.username }}</strong></a> - @{{ tweet.humanCreatedAt }}
                        </div>
                        <p>@{{ tweet.body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
