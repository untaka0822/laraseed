<!-- resouces/views/tweets/index.blade.php -->
 
@extends('layout')
 
@section('content')
    <h1>Tweets</h1>
    {{-- ログインしている時だけ表示 --}}
    @if (Auth::check())
        {!! link_to('tweets/create', 'ツイートする', ['class' => 'btn btn-primary']) !!}
    @endif

    <!--↓↓ 検索フォーム ↓↓-->
    <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="search" method="POST">
             {{ csrf_field() }} {{-- viewヘルパー関数  これだけで<input >--}} 
          <div class="form-group">
            <input type="text" name="search_word" class="form-control">
          </div>
          <input type="submit" value="検索" class="btn btn-info">
        </form>
    </div>
    <!--↑↑ 検索フォーム ↑↑-->
    <br>
    <br>
    <br>
    <hr/>
     
    @foreach($tweets as $tweet)
        <article>
            <h2>
                <a href="{{ url('tweets', $tweet->id) }}">
                    {{ $tweet->title }}
                </a>
            </h2>
            <div class="body">
                {{ $tweet->body }}
            </div>
        </article>
    @endforeach
@endsection