@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $user->username }}</h3>
            </div>
        </div>
    </div>
@endsection
