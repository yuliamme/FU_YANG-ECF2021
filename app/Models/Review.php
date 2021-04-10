<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function user() {
//        return $this->belongsTo(User::class, 'id');
        return $this->belongsTo('User', 'user_id');
    }

//    public function anime() {
//        return $this->belongsTo(Anime::class, 'id');
//    }
}
