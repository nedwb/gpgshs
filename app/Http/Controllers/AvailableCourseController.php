<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use DateTime;
use DB;
use Redirect;
use App\AvailableCourse;

class AvailableCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}