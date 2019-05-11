<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserDetail;
use App\CareerTrack;
use App\CareerStrand;
use App\AvailableCourse;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Function for the home page.
    public function index()
    {
        $user = array((object) ['rolename' => 'guest']);
        $user_details = array((object) ['rolename' => 'guest']);

        $career_tracks = CareerTrack::getCareerAllTrackDetails()->get();
        $career_strands = CareerStrand::getAllCareerStrands()->get();

        return view('home', compact('user', 'user_details', 'career_tracks', 'career_strands'));
    }

    //Function to retrieve course details by school.
    public function getAcademicDetails(Request $request)
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);

        // Get all career details.
        $career_details = AvailableCourse::getCareerStrandDetails('1', '1')->get();

        return view('academic', compact('user', 'career_details'));
    }

    //Function to retrieve course details by school.
    public function getTvlDetails(Request $request)
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);
        // Get all career details.
        $career_details = AvailableCourse::getCareerStrandDetails('1', '2')->get();

        return view('tvl', compact('user', 'career_details'));
    }

    //Function to retrieve course details by school.
    public function getSportDetails(Request $request)
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);
        // Get all career details.
        $career_details = AvailableCourse::getCareerStrandDetails('1', '3')->get();

        return view('sports', compact('user', 'career_details'));
    }

    //Function to retrieve course details by school.
    public function getArtDetails(Request $request)
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);
        // Get all career details.
        $career_details = AvailableCourse::getCareerStrandDetails('1', '4')->get();

        return view('arts', compact('user', 'career_details'));
    }

    public function contact()
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);

        return view('contact', compact('user'));
    }

    public function about()
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);

        return view('about', compact('user'));
    }
    public function history()
    {
        $id = Auth::id();

        if ($id != null) {
            $user = User::getUser($id)->get();
        }
        else
            $user = array((object) ['rolename' => 'guest']);

        return view('history', compact('user'));
    }
}
