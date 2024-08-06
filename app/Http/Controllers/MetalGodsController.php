<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Error;
use App\Models\Review;
use App\Models\Section;

use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;
use Termwind\Components\Raw;

class MetalGodsController extends Controller
{
    
    //SHOW ALL REVIEWS
    public function getReviews(){

        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->orderBy('updated_at','desc')
            //->limit(5)
            ->get();

        return view('home.reviews.index', compact('review'));

    }

    // SHOW REVIEW BY ID
    public function getReviewById($id){

        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->where('reviews.id', $id)
            ->get();

        return view('home.reviews.read-review', compact('review'));
    }


    //SHOW ALL BANDS
    public function getBands(){

        $band=Band::all();
        return view('home.bands.index', compact('band'));
    }


    //SHOW BAND BY ID GROUP BY ALBUM TITLE (NO DUPLICATES)
    public function getBandById($id){
        
        $band = DB::table('bands')
        ->join('reviews','reviews.band_id','=','bands.id')
        ->select('bands.*','reviews.id','reviews.album_title','reviews.album_year','reviews.album_image',DB::raw('AVG(reviews.rating) as rating'))
        ->where('bands.id', $id) 
        ->groupBy('reviews.album_title')
        ->orderBy('album_year','asc')
        ->get();

        return view('home.bands.discography.index', compact('band'));

    }

    //SHOW ALBUM BY ID AND ALL REVIEWS OF IT
    public function getAlbumById($id){

        $album=Review::all();
        return view ('home.bands.album',compact('album'));
        
    }


     //REPORT AN ERROR FORM
     public static function sendErrorForm()
     {
         $section = Section::all();
         return view('home.report-an-error', compact('section'));
     }
 
     //SEND REQUEST
     public static function sendError(Request $request)
     {
 
         // VALIDATIONS / REQUIRED FIELDS
         request()->validate([
             'section_name' => 'required',
             'email' => 'required',
             'subject' => 'required',
             'message' => 'required',
 
         ]);
 
 
         $error = new Error();
         $error->section_id = $request->section_name;
         $error->email = $request->email;
         $error->subject = $request->subject;
         $error->message = $request->message;
         $error->save();
 
         return redirect()->back()->with('message', 'Your message has been sent successfully');
     }
 
 
}
