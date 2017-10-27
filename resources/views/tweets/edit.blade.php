{{-- resources/views/articles/edit.blade.php --}}
 
@extends('layout')
 
@section('content')
    <h1>Edit: {{ $tweet->title }}</h1>
 
    <hr/>
 
     @include('errors.form_errors')
 
    {!! Form::model($tweet, ['method' => 'PATCH', 'url' => ['tweets', $tweet->id]]) !!}
        @include('tweets.form', ['published_at' => $tweet->published_at->format('Y-m-d'), 'submitButton' => 'Edit Tweet'])
    {!! Form::close() !!}
 
@stop