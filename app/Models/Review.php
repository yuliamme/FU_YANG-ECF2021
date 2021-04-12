<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
//    protected $guarded = [];

    protected $fillable = ['anime_id', 'user_id', 'rating', 'comment', 'created_at'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
//        return $this->belongsTo('User', 'user_id');
    }

    public function anime() {
        return $this->belongsTo(Anime::class, 'anime_id');
    }
}
