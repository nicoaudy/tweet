@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $user->username }}</h3>

                @if(auth()->user()->isNot($user))
                    @if(auth()->user()->isFollowing($user))
                        <a href="">Unfollow</a>
                    @else
                        <a href="{{ route('user.follow', $user) }}">Follow</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
