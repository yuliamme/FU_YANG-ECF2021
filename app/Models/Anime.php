<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = ['title', 'description', 'cover'];

    public function reviews() {
        return $this->hasMany(Review::class)->orderBy('created_at', 'DESC');
    }

}
