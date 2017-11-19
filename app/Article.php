<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
