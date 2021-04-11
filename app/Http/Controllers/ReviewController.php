<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Review;

class ReviewController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }

//    public function index() {
//        return view('reviews');
//    }


    public function create($id) {

        $anime  = Anime::find($id);

        return view('new_review', [
            'anime' => $anime,
        ]);
    }

    public function store(Request $request) {

//        $data = request() -> validate([
//            'rating' => ['required', 'integer' ],
//            'comment' => ['required', 'max:255' ],
//            'anime_id' => 'required',
//            'user_id' => 'required',
//        ]);

        dd($request);
        return redirect('/');
        dd([
            'rating' => $data['rating'],
            'comment' => $data['comment'],
            'anime_id' => $id,
            'user_id' => auth()->user()->id,
        ]);

//        auth()->user()->reviews()->create($data);
        auth()->user()->reviews->create([
            'rating' => $data['rating'],
            'comment' => $data['comment'],
            'anime_id' => $id,
            'user_id' => auth()->user()->id,
        ]);

//        return redirect('/anime/'.$id);
    }

    public function edit() {

    }

    public function update() {

    }

    public function show($id) {
        $post = Post::find($id);
        return view('review/show');

    }

    public function destroy() {

    }


}
