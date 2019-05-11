<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Redirect;
use App\UserDetail;
use App\CareerStrand;
use App\AvailableCourse;
use App\Learner;

class CareerSchoolLookup extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	//Function to retrieve user details.
    public function view_info(Request $request)
    {
        $id = Auth::id();
        $user_details = UserDetail::getUserDetails($id)->get();
        $learner_ids = Learner::checkLearnersIds($id)->get();

        $results = AvailableCourse::getAvailableCourseSchoolDetails($request->search_key)->get();

        if (count($results) > 0) {
            if (count($learner_ids) > 0) {
                // Check if user has a record in the learners table, if so, means user is already enrolled and cannot enroll again.
                if ($learner_ids[0]->school_year != null || $learner_ids[0]->senior_high_schools_id != null || $learner_ids[0]->career_strands_id != null) {

                    $learner_details = Learner::checkLearnersDetails($id)->get();

                    return view('lookup', compact('user_details', 'results', 'learner_details'));
                }
                else
                    return view('lookup', compact('user_details', 'results'));
            }
            else {
                return view('lookup', compact('user_details', 'results'));
            }
        }
        else {
            return view('lookup', compact('user_details'));
        }
    }
}
