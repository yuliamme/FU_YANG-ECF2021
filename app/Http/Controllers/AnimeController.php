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

    public function sortList () {
        // join 3 tables 'reviews', 'animes' and 'user'
        $toplist = DB::table('reviews')
            ->join('animes', 'reviews.animeid', '=', 'animes.id')
            ->select(array('animes.*',
                DB::raw('round(AVG(rating),2) as ratings_average')))
            // make a group according to animes;id
            ->groupby('animes.id')
            // make a order according to rating-average from high to low
            ->orderBy('ratings_average', 'DESC')
            ->get();
        // views
        return view('top', ["toplists" => $toplist]);

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
