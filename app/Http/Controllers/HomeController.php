<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserDetail;
use App\CareerTrack;
use App\CareerStrand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Function for the index.
    public function index() {
         return view('courses');
    }

    // Function for the home page.
    public function home()
    {
        $id = Auth::id();
        $user = User::getUser($id)->get();
        $user_details = UserDetail::getUserDetails($id)->get();

        $career_tracks = CareerTrack::getCareerAllTrackDetails()->get();

        // Check if user has data from users details table.
        if (count($user_details) > 0)
        {
            return view('home', compact('user', 'user_details', 'career_tracks'));
        }
        else
        {
            return view('home', compact('user'));
        }
    }

    //Function to retrieve course details by school.
    public function getAcademicDetails(Request $request)
    {
        $id = Auth::id();

        // Get all career details.
        $career_details = CareerStrand::getCareerStrandDetailsByTrack('1')->get();

        return view('academic', compact('career_details'));
    }

    //Function to retrieve course details by school.
    public function getTvlDetails(Request $request)
    {
        $id = Auth::id();

        // Get all career details.
        $career_details = CareerStrand::getCareerStrandDetailsByTrack('2')->get();

        return view('tvl', compact('career_details'));
    }

    //Function to retrieve course details by school.
    public function getSportDetails(Request $request)
    {
        $id = Auth::id();

        // Get all career details.
        $career_details = CareerStrand::getCareerStrandDetailsByTrack('3')->get();

        return view('sports', compact('career_details'));
    }

    //Function to retrieve course details by school.
    public function getArtDetails(Request $request)
    {
        $id = Auth::id();

        // Get all career details.
        $career_details = CareerStrand::getCareerStrandDetailsByTrack('4')->get();

        return view('arts', compact('career_details'));
    }
}
