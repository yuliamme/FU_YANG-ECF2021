<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function index() {
        $animes = Anime::all();
        return view('anime/index', [
            'animes' => $animes,
        ]);
    }

    public function show($id) {
        $anime  = Anime::find($id);
        return view('anime/show', [
            "anime" => $anime,
            "reviews" => $anime->reviews,
            ]);
    }

    public function create() {
        return view('anime/create');
    }

    public function store() {
        $data = request() -> validate([
            'title' => ['required', 'max:100' ],
            'description' => ['required', 'max:1000' ],
        ]);

        Anime::create($data);
        return redirect('/');
    }

    public function rank() {
        $animes = Anime::join('reviews', 'reviews.anime_id', '=', 'animes.id')
            ->select(DB::raw('round(coalesce(avg(rating),0),2) as average, animes.*'))
//            ->select(array('animes.*',
//                DB::raw('round(AVG(rating),2) as ratings_average')))
            ->groupBy('animes.id', 'title', 'description', 'cover')
            ->orderBy('average','DESC')
            ->get();

        return view('top', [
            'animes' => $animes,
        ]);
    }

}
