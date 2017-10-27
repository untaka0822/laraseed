<!-- resouces/views/articles/show.blade.php -->
 
@extends('layout')
 
@section('content')
    <h1>{{ $tweet->title }}</h1>
 
    <hr/>
 
    <article>
        <div class="body">{{ $tweet->body }}</div>
    </article>

   {{-- ログインしている時だけ表示 --}}
    @if (Auth::check())
        <br/>
 
        {!! link_to(route('tweets.edit', [$tweet->id]), '編集', ['class' => 'btn btn-primary']) !!}
 
        <br/>
        <br/>
 
        {!! delete_form(['tweets', $tweet->id]) !!}
    @endif
@endsection