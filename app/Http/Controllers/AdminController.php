<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Error;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;


use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


    //DASHBOARD
    public function index()
    {
        return view('admin.dashboard');
    }

    /*GENRES*/

    //ADD GENRE FORM
    public function addGenreForm()
    {
        return view('admin.genres.add-genre');
    }

    // ADD GENRE INTO DATABASE
    public function addGenre(Request $request)
    {

        // VALIDATION
        request()->validate([
            'genre_name' => 'required',
        ]);

        $genre = new Genre;
        $genre_name = $request->genre_name;

        //IF GENRE EXIST IN DATABASE
        if (Genre::where('genre_name', '=', $genre_name)->exists()) {
            //if($genre=Genre::firstOrCreate(['genre_name'=>$genre_name])){
            return redirect()->back()->with('message', 'Genre exist in database !');
        } else { // ELSE, INSERT IT
            $genre = new Genre;

            $genre->genre_name = ucfirst($request->genre_name);
            $genre->save();
            return redirect()->back()->with('message', 'Genre added successfully');
        }
    }

    // SHOW ALL GENRES
    public function getGenres()
    {
        $genre = Genre::all();
        return view('admin.genres.index', compact('genre'));
    }

    //SHOW GENRE TO EDIT BY ID
    public function getGenreById($id)
    {
        $genre = Genre::find($id);
        return view('admin.genres.edit-genre', compact('genre'));
    }

    //EDIT GENRE
    public function editGenre(Request $request, $id)
    {
        //VALIDATION
        request()->validate([
            'genre_name' => 'required',
        ]);
        $genre = Genre::find($id);
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return redirect()->back()->with('message', 'Genre updated successfully');
    }

    //DELETE GENRE BY ID
    public function deleteGenre($id)
    {
        Genre::find($id)->delete();
        return back();
    }


    /* BANDS*/

    //ADD BAND FORM
    public static function addBandForm()
    {
        return view('admin/bands/add-band');
    }


    // ADD BAND INTO DATABASE
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
            return redirect()->back()->with('message', 'Band already exists in database !');
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

    // SHOW ALL BANDS
    public function getBands()
    {
        $band = Band::all();
        return view('admin.bands.index', compact('band'));
    }

    //SHOW BAND BY ID
    public function getBandById($id)
    {
        $band = Band::find($id);
        return view('admin.bands.edit-band', compact('band'));
    }
    //EDIT BAND
    public function editBand(Request $request, $id)
    {
        // VALIDATION
        request()->validate([
            'band_name' => 'required',
            'band_country' => 'required',
            'band_year_creation' => 'required',
        ]);

        $band = Band::find($id);
        // BAND DATA
        $band->band_name = $request->band_name;
        $band->band_country = $request->band_country;
        $band->band_year_creation = $request->band_year_creation;


        // IF THERE IS A NEW IMAGE,UPDATE IT 
        $image = $request->band_image;
        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->band_image->move('bandImages', $imageName);
            $band->band_image = $imageName;
        }

        $band->save();
        return redirect()->back()->with('message', 'Band updated successfully');
    }

    //DELETE BAND BY ID 
    public function deleteBand($id)
    {
        Band::find($id)->delete();
        return back();
    }


    /* REVIEWS*/


    //SHOW ADD REVIEW FORM
    public static function addReviewForm()
    {

        $band = Band::all();
        $genre = Genre::all();
        return view('admin.reviews.add-review', compact('band', 'genre'));
    }

    //ADD REVIEW
    public static function addReview(Request $request)
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

        $review = new Review();
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

    //SHOW REVIEWS
    public static function getReviews()
    {

        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->get();

        return view('admin.reviews.index', compact('review'));
    }

    //SHOW REVIEW BY ID
    public static function getReviewById($id)
    {
        $review = Review::find($id);
        $band = Band::all();
        $genre = Genre::all();
        return view('admin.reviews.view-edit-review', compact('review', 'band', 'genre'));
    }

    // EDIT REVIEW
    public static function editReview(Request $request, $id)
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

    //DELETE REVIEW BY ID
    public function deleteReview($id)
    {
        Review::find($id)->delete();

        return back();
    }


    /* USERS*/

    //SHOW ALL USERS
    public function getUsers()
    {

        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    //GET USER BY ID

    public function getUserById($id)
    {
        $user = User::find($id);
        return view('admin.users.edit-role', compact('user'));
    }

    //EDIT USER ROLE BY ID
    public static function editUserRole(Request $request, $id)
    {
        request()->validate([
            'userRole' => 'required',
        ]);
        $user = User::find($id);
        $user->userRole = $request->userRole;
        $user->save();
        return redirect()->back()->with('message', 'Role updated successfully');
    }

    //DELETE USER
    public static function deleteUser($id)
    {
        User::find($id)->delete();
        return back();
    }



    /* REPORTS*/


    public static function getReports(){
        $report = DB::table('errors')
            ->join('sections', 'sections.id', '=', 'errors.section_id')
            ->select('errors.*', 'sections.section_name')
            ->get();
        return view('admin.reports.index', compact('report'));
    }
}
