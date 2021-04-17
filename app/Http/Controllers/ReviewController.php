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

//    public function store(Request $request) {
    public function store() {

        $data = request() -> validate([
            'rating' => ['required', 'integer' ],
            'comment' => ['required', 'max:255' ],
            'anime_id' => 'required',
//            'user_id' => 'required',
        ]);

        dd($data);


//        auth()->user()->reviews()->create($data);
        auth()->user()->reviews->create([
            'rating' => $data['rating'],
            'comment' => $data['comment'],
            'anime_id' => $id,
            'user_id' => auth()->user()->id,
        ]);

//        return redirect('/anime/'.$id);
    }

    public function edit($id) {

        $review = Review::find($id);
        return view('review/edit', [
            'review' => $review,
        ]);
    }

    public function update($id) {
        $data = request() -> validate([
            'rating' => ['required', 'integer' ],
            'comment' => ['required', 'max:255' ],
        ]);

        $review = Review::find($id);
        $review->update($data);

        return redirect('/review/'.$id);

    }

    public function show($id) {

        $review = Review::find($id);
        return view('review/show', [
            'review' => $review,
        ]);

    }

    public function destroy() {

    }


}
