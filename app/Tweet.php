<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Tweet extends Model
{
     protected $fillable = ['title', 'body', 'published_at'];

     // 日付ミューテーターで文字型をDate型に変えている
     protected $dates = ['published_at'];

    //  published scopeを定義
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
