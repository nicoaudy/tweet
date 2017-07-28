@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="timeline">
        <div class="col-md-4">
            <form action="#">
                <div class="form-group">
                    <textarea rows="5" class="form-control" placeholder="What are you upto?" maxlength="140" required></textarea> <br>
                    <input type="submit" value="Tweet" class="form-control">
                </div>
            </form>
        </div>
        <div class="col-md-4">
            Timeline
        </div>
    </div>
</div>
@endsection
