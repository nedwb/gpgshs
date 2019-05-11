<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use DB;
use Redirect;
use App\PersonalityTest;
use App\UserDetail;

class PersonalityTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get first set of questions
    public function viewTestQuestions(Request $request)
    {
        $id = Auth::id();
        $user_details = UserDetail::getUserDetails($id)->get();

        if (count($user_details) > 0)
        {
            $questions = PersonalityTest::getRandomTest($request->qset)->get();
            return view('personality-test', compact('user_details', 'questions'));
        }
        else
        {
            return view('personality-test');
        }
    }
}
