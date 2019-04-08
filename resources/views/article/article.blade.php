@extends('layouts.app')
@section('content')
@foreach ($articles as $article)
<div class="panel panel-success">
        <div class="panel-heading">
                <h1>{{ $article->title }}
                        {{-- # One to Many [1/6] --}}
                        {{-- $article->functionInArticle->fieldOptional --}}
                        <small> posted by {{ $article->user->name }}</small>
                </h1>
        </div>
        <div class="panel-body">
                <p>{{ $article->body }}</p>
                <h3>Comments</h3>
                @foreach ($article->comments as $comment)
                <p> {{ $comment->body }} </p>
                @endforeach
        </div>
</div>
@endforeach
@endsection