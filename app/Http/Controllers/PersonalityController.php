<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use DateTime;
use DB;
use Redirect;
use App\Personality;
use App\StrandPersonality;
use App\Learner;
use App\UserDetail;

class PersonalityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get personality details.
    public function viewPersonality(Request $request)
    {
        $id = Auth::id();
        $user_details = UserDetail::getUserDetails($id)->get();

        // Check if user has data from user_details.
        if (count($user_details) > 0)
        {
            $learner_ids = Learner::checkLearnersIds($id)->get();

            // Check if user has data from learners table.
            if (count($learner_ids) > 0)
            {
                $mbti_id = $learner_ids[0]->personalities_id;

                // Get the MBTI details.
                $mbti_details = Personality::getPersonalityDetailsById($mbti_id)->get();
                // Get the suggested career track/strand.
                $suggested_career = StrandPersonality::getMappingDetails($mbti_id)->get();

                return view('personality-result', compact('user_details', 'mbti_details','suggested_career'));
            }
            else
            {
                return view('personality-result', compact('user_details'));
            }
        }
        else
        {
            return view('personality-result');
        }
    }

    // Get personality type details.
    public function viewTestResults(Request $request)
    {
        $id = Auth::id();
        $user_details = UserDetail::getUserDetails($id)->get();
        $mbti = strtoupper($request->mbti_type);

        // Get the MBTI details.
        $mbti_details = Personality::getPersonalityDetailsByType($mbti)->get();
        $mbti_id = $mbti_details[0]->id;

        // Get the suggested career track/strand.
        $suggested_career = StrandPersonality::getMappingDetails($mbti_id)->get();

        try
        {
            if (Learner::find($id))
                $learner = Learner::find($id);
            else
                $learner = new Learner;
            
            $learner->id = $id;
            $learner->personalities_id = $mbti_id;
            $learner->save();

            $request->session()->flash('success_message', 'Personality type successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }

        return view('personality-result', compact('user_details','mbti_details','suggested_career'));
    }
}
