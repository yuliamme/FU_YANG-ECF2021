<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }

    public function index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('reviews')->with('reviews', $user->reviews);
    }

    public function show($id) {
        $review = Review::find($id);
        return view('review/show', [ 'review' => $review, ] );
    }

    public function create($id) {
        $anime  = Anime::find($id);
        return view('new_review', [ 'anime' => $anime, ] );
    }

    public function store($id) {
        $data = request() -> validate([
            'rating' => ['required', 'integer' ],
            'comment' => ['required', 'max:1000' ],
            'anime_id' => 'required',
            'user_id' => 'required',
        ]);

        Review::create($data);
        return redirect('/anime/'.$id);
    }

    public function edit($id) {
        $review = Review::find($id);
        return view('review/edit', [ 'review' => $review, ] );
    }

    public function update($id) {
        $data = request() -> validate([
            'rating' => ['required', 'integer' ],
            'comment' => ['required', 'max:1000' ],
        ]);

        $review = Review::find($id);
        $review->update($data);
        return redirect('/review/'.$id);
    }

    public function destroy($id) {
        $review = Review::find($id);
        $anime_id = $review->anime_id;
        $review->delete();

        return redirect('/anime/'.$anime_id);
    }


}
