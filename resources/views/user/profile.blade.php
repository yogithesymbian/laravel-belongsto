@extends('layouts.app')
@section('content')
<div class="panel panel-success">

    <div class="panel-heading">
        <h1> My Name : {{ $user->name }} -> Profile</h1>
    </div>
    <div class="panel-body">
        <p>
            <h3>this data addresses ONE to ONE [3/6] hasOne</h3>
            <strong> Address : </strong> <em> {{ $user->address->country }}</em>
            <br>
            /**
            * hasOne # One to One [3/6]
            * this bad
            * ?todo
            *
            */
            <br>
            <h3>this data countries ONE to MANY [5/6] belongsTo</h3>
            <strong> Country : </strong> <em> {{ $user->country->name }}</em>
            <br>
            /**
            * belongsTo negatif address
            * fk_table to pk_table
            */
        </p>
    </div>
    <div class="panel-heading">
        <h1> hasMany [ one to many [ 2/6 ]] </h1>
    </div>
    <div class="panel-body">
        {{ $user->articles }}
        <br>
        /**
        * hasMany # One to Many [2/6]
        */
    </div>

    <div class="panel-heading">
        <h1> <small> The Data is From </small> ( {{ $user->name }} )<small> Have </small> FOREIGNKEY</h1>
    </div>

    <div class="panel-body">
    @foreach ($user->articles as $article)
        <h3> {{ $article->title }} <small> by {{ $user->name }} </small> </h3>
        <p> {{ $article->body }} </p>
        <hr>
        <h3>Comments</h3>
        {{-- @if ()
        @endif --}}
        {{-- this duplicate --}}
        @foreach ($user->comments as $comment)
        <p> {{ $comment->body }}  </p>
        @endforeach
        {{-- komentars{hasMany} | comments {morphMany} --}}
        <hr>
    @endforeach

    </div>
    <div class="panel-heading">
        <h1> [ Many to Many ] [4/6]</h1>
        <h3> role are belongsToMany and country are belongsTo</h3>
    </div>
    <div class="panel-body">

        <p>
            <strong><em>{{ $user->name }}</em></strong>
            <br>
            <strong> Country : </strong> <em> {{ $user->country->name }}</em>
            <br>
            <strong> Roles : </strong>
            <ul>
                @foreach ($user->roles as $role)
                <li> {{ $role->name }} </li>
                @endforeach
            </ul>
            /**
            * many to many
            * skiping brief_table
            * use belongsToMany
            */
        </p>
    </div>
</div>
@endsection