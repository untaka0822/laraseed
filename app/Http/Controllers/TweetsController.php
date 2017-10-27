<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; // store()のバリデーション
use App\Http\Controllers\Controller;
use App\Tweet; // モデルの指定がないとエラーになる
use App\Http\Requests\TweetRequest;
use Carbon\Carbon;

class TweetsController extends Controller
{
    public function index() {
    	$tweets = Tweet::latest('created_at')->published()->get();
        // dd($tweets); // できていた
    	return view('tweets.index', compact('tweets')); // viewで値を持っていく先を指定 compactで値を変数に格納してviewの指定した場所へ持っていく
    }

    public function create() {
    	return view('tweets.create');
    }

    public function store(TweetRequest $request) { // TweetRequestはPOST送信されたものが入っている
 
        // Tweet::create($request->all());
        \Auth::user()->tweets()->create($request->all());
        \Session::flash('flash_create', 'ツイートを作成しました。');
        // return redirect('/');
        return redirect()->route('tweets.index');
    }

    public function show($id) {
        $tweet = Tweet::findOrFail($id); //showメソッドの中に入っているため不要
 
        return view('tweets.show', compact('tweet'));
    }

    public function edit($id) {
        $tweet = Tweet::findOrFail($id); 
 
        return view('tweets.edit', compact('tweet'));
    }
 
    public function update($id, TweetRequest $request) {
        $tweet = Tweet::findOrFail($id);
        \Session::flash('flash_update', 'ツイートを更新しました。');
 
        $tweet->update($request->all());
 
        // return redirect(url('tweets', [$tweet->id]));
        return redirect()->route('tweets.show', $tweet->id);
    }

    public function destroy($id) { // ここの$idはrouteの{id}の部分、つまりリクエストで飛んできたURLのidの値
        $tweet = Tweet::findOrFail($id);
        // dd($tweet);
        \Session::flash('flash_delete', 'ツイートを削除しました。');
 
        $tweet->delete();
        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function search(Request $request) // $requestにはポスト送信されたものが入っている
    {
        $search_word = $request->input('search_word'); // input('')の中身はinputタグのnameの部分 ここで$request(formで飛ばされた値)を拾ってくる
        $like_words = '%' . $search_word . '%'; // それを曖昧検索するためにここで文字連結を先にする
        // dd($search_word); // var_dump的なデバッグ処理確認
        // ここに検索機能を書く
        $tweets = Tweet::where('title', 'like', $like_words)->get(); // no objectってエラーが出たらtoArray()はいらない
        // dd($tweets); // var_dump的なデバッグ処理確認
        return view('tweets.index', compact('tweets')); // viewでindex.bladeを使うけどURLはformでポスト送信されたaction名
    }

}
