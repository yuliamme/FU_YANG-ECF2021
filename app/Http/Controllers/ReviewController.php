<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Review;

class ReviewController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function create() {
        $anime  = anime::whereId($id)->first();

        return view('new_review');
    }

    public function store() {
        $data = request() -> validate([
            'rating' => ['required', 'integer' ],
            'comment' => ['required', 'max:255' ],
        ]);

//        auth()->user()->reviews()->create($data);
        auth()->user()->reviews()->create([
            'rating' => $data['rating'],
            'comment' => $data['comment'],
        ]);

        return redirect('/anime/1');
    }


}
