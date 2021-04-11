<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function index() {

        $animes = Anime::all();

        return view('welcome', [
            'animes' => $animes,
        ]);
    }

    public function show($id) {

        $anime  = Anime::find($id);

        return view('anime', [
            "anime" => $anime,
            "reviews" => $anime->reviews,
            ]);

    }

    public function rank() {

        $animes = Anime::join('reviews', 'reviews.anime_id', '=', 'animes.id')
            ->select(DB::raw('coalesce(avg(rating),0) as average, animes.*'))
            ->groupBy('anime_id')
            ->orderBy('average','DESC')
            ->get();

        return view('top', [
            'animes' => $animes,
        ]);

    }


}
