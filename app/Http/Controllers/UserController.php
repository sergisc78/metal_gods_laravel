<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





use Illuminate\Http\Request;

class UserController extends Controller
{

    //USER DASHBOARD
    public static function index()
    {
        return view('user.dashboard');
    }

    // ADD REVIEW FORM
    public static function addReviewForm()
    {
        $band = Band::all();
        $genre = Genre::all();
        return view('user.reviews.add-review', compact('band', 'genre'));
    }

    //ADD REVIEW IN DATABASE
    public static function addReview(Request $request)
    {

        request()->validate([
            'band_name' => 'required',
            'genre_name' => 'required',
            'name' => 'required',
            'album_title' => 'required',
            'album_year' => 'required',
            'album_link' => 'required',
            'album_review' => 'required',
            'rating' => 'required',
        ]);

        $review = new Review;

        $user_id = $request->name;
        $album_title = $request->album_title;


        //CHECK IF YOU HAVE ALREADY REVIEWED THE ALBUM

        if (Review::where('user_id', '=', $user_id)->exists() && Review::where('album_title', '=', $album_title)->exists()) {
            return redirect()->back()->with('message', 'This album  has already reviewed by you !');
        } else { //ADD REVIEW
            $review = new Review();

            $review->genre_id = $request->genre_name;
            $review->band_id = $request->band_name;
            $review->user_id = $request->name;
            $review->album_title = $request->album_title;

            //ADD IMAGE

            $image = $request->album_image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->album_image->move('albumImages', $imageName);
            $review->album_image = $imageName;

            $review->album_year = $request->album_year;
            $review->album_link = $request->album_link;
            $review->album_review = $request->album_review;
            $review->rating = $request->rating;

            $review->save();

            return redirect()->back()->with('message', 'Review added successfully');
        }
    }

    //SHOW ALL REVIEWS
    public static function getReviews()
    {

        
        
        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->get();

        return view('user.reviews.index', compact('review'));
    }

    public static function getReviewById($id)
    {
        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->where('reviews.id', $id)
            ->get();

        return view('user.reviews.view-review', compact('review'));
    }

    public static function getYourReviews()
    {
        
        $review = DB::table('reviews')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*','bands.band_name', 'users.name')
            ->where('users.name','=',Auth::user()->name)
            ->get();

            return view('user.reviews.your-reviews', compact('review'));
    }


    //SHOW YOUR REVIEW BY ID
    public static function getYourReviewById($id)
    {
        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->where('reviews.id', $id)
            ->get();

        return view('user.reviews.view-edit-your-review', compact('review'));
    }

     // VIEW OR EDIT REVIEW
     public static function viewEditYourReview(Request $request, $id)
     {
 
         // VALIDATION
         request()->validate([
             'band_name' => 'required',
             'genre_name' => 'required',
             'name' => 'required',
             'album_title' => 'required',
             'album_year' => 'required',
             'album_link' => 'required',
             'album_review' => 'required',
             'rating' => 'required',
 
         ]);
 
         $review = Review::find($id);
         $review->genre_id = $request->genre_name;
         $review->band_id = $request->band_name;
         $review->album_title = $request->album_title;
         $review->album_year = $request->album_year;
         $review->album_link = $request->album_link;
         $review->album_review = $request->album_review;
         $review->rating = $request->rating;
 
         // IF THERE IS A NEW IMAGE,UPDATE IT 
 
         $image = $request->album_image;
         if ($image) {
 
             $imageName = time() . '.' . $image->getClientOriginalExtension();
             $request->album_image->move('albumImages', $imageName);
             $review->album_image = $imageName;
         }
 
         $review->save();
 
         return redirect()->back()->with('message', 'Review updated successfully');
     }



    /* BANDS */
    //ADD BAND FORM
    public static function addBandForm()
    {
        return view('user.bands.add-band');
    }

    //ADD BANDS IN DATABASE
    public static function addBand(Request $request)
    {

        // VALIDATION
        request()->validate([
            'band_name' => 'required',
            'band_country' => 'required',
            'band_year_creation' => 'required',
        ]);

        $band = new Band;
        $band_name = $request->band_name;

        // IF BAND EXIST
        if (Band::where('band_name', '=', $band_name)->exists()) {
            return redirect()->back()->with('message', $band_name . ' exists in database !');
        } else { //INSERT BAND
            //ADD IMAGE
            $band = new Band;
            $image = $request->band_image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->band_image->move('bandImages', $imageName);
            $band->band_image = $imageName;

            //ADD OTHER DATA
            $band->band_name = ucfirst($request->band_name);
            $band->band_country = ucfirst($request->band_country);
            $band->band_year_creation = ucfirst($request->band_year_creation);

            $band->save();

            return redirect()->back()->with('message', 'Band added successfully');
        }
    }

    //SHOW BANDS
    public static function getBands()
    {
        $band = Band::all();
        return view('user.bands.index', compact('band'));
    }


    //ADD GENRE FORM
    public static function addGenreForm()
    {
        return view('user.genres.add-genre');
    }
    //ADD GENRE
    public static function addGenre(Request $request)
    {
        // VALIDATION
        request()->validate([
            'genre_name' => 'required',
        ]);
        $genre = new Genre;
        $genre_name = $request->genre_name;

        // IF GENRE EXIST
        if (Genre::where('genre_name', '=', $genre_name)->exists()) {
            return redirect()->back()->with('message', $genre_name . ' exists in database !');
        } else { //INSERT GENRE
            $genre->genre_name = ucfirst($request->genre_name);
            $genre->save();
            return redirect()->back()->with('message', 'Genre added successfully');
        }
    }



    //SHOW ALL GENRES
    public static function getGenres()
    {
        $genre = Genre::all();
        return view('user.genres.index', compact('genre'));
    }
}
