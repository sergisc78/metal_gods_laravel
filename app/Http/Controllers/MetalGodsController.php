<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Review;
use Illuminate\Support\Facades\DB;




use Illuminate\Http\Request;


class MetalGodsController extends Controller
{
    
    public function getLastReviews(){
        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->orderBy('updated_at','desc')
            //->limit(5)
            ->paginate(5);

        return view('home.last-reviews', compact('review'));

    }
}
