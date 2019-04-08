@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h1>
                    Posts made in the {{ $country->name }}
                </h1>
            </div>
            <div class="panel-body">
                @foreach ($country->articles as $article)
                <h3> {{ $article->title }} <small>by {{ $article->user->name }} </small> </h3>
                <p>{{ $article->body }}</p>

                <h3> Comments </h3>
                @endforeach

                {{-- @foreach ($country->comments as $comment)
                    <p> {{ $comment->body }} </p>
                @endforeach --}}

                {{-- @foreach ($country->comments as $comment)

                <h3>Comments</h3>
                <p> {{ $comment->body }} </p>

                @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection