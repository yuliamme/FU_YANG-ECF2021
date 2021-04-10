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

        $anime  = anime::whereId($id)->first();

        return view('anime', [
            "reviews" => $anime->reviews,
            "anime" => $anime,
            ]);

    }


}
