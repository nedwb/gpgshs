<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use DB;
use Redirect;
use App\UserDetail;
use App\UserHealthDetail;
use App\UserGuardianDetail;
use App\UserEducationalDetail;
use App\CareerStrand;

class UserDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Function to create new user details.
    public function save_info(Request $request)
    {
        //Get the current ID of user.
        $id = Auth::id();
        $uri = $request->path();

        //For profile page 1.
        if ($uri == "profile_1/save")
        {
            //Input data validation.
            $this->validate(request(), [
                'first_name'=> 'required|string|max:100',
                'middle_name'=> 'required|string|max:100',
                'last_name'=> 'required|string|max:100',
                'extension_name'=> 'nullable|string|max:10',
                'birth_date'=> 'required|date_format:Y-m-d',
                'age'=> 'required|integer|min:12',
                'sex'=> 'required|string|max:1',
                'religion'=> 'required|string|max:100',
                'mother_tongue'=> 'nullable|string|max:100',
                'ip_group'=> 'nullable|string|max:100',
                'address'=> 'required|string|max:255',
                'barangays_id'=> 'required|integer|max:100',
                'tel_no'=> 'required|string|max:13',
                'mobile_no'=> 'required|string|max:13',
            ]);

            //Saving data to user_details table.
            try
            {
                if (UserDetail::find($id))
                    $profile = UserDetail::find($id);
                else
                    $profile = new UserDetail;
                
                $profile->id = $id;
                $profile->first_name = $request->first_name;
                $profile->middle_name = $request->middle_name;
                $profile->last_name = $request->last_name;
                $profile->extension_name = $request->extension_name;
                $profile->address = $request->address;
                $profile->birth_date = $request->birth_date;
                $profile->age = $request->age;
                $profile->sex = $request->sex;
                $profile->religion = $request->religion;
                $profile->mother_tongue = $request->mother_tongue;
                $profile->ip_group = $request->ip_group;
                $profile->barangays_id = $request->barangays_id;
                $profile->tel_no = $request->tel_no;
                $profile->mobile_no = $request->mobile_no;
                $profile->save();

                $request->session()->flash('user_detail_message', 'Personal information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_detail_error', 'ERROR! Cannot create record, data already exists.');
            }
             return redirect()->route('profile_2');
        }

        //For profile page 2.
        else if ($uri == "profile_2/save")
        {
            //Input data validation.
            $this->validate(request(), [
                'father_name'=> 'required|string|max:100',
                'father_contact_no'=> 'nullable|string|max:13',
                'mother_name'=> 'required|string|max:100',
                'mother_contact_no'=> 'nullable|string|max:13',
                'guardian_name'=> 'required|string|max:100',
                'guardian_contact_no'=> 'required|string|max:13',
                'lrn_no'=> 'nullable|integer|max:999999999999',
                'prev_school_year'=> 'required|date_format:"Y"',
                'prev_junior_hs'=> 'required|string|max:255',
                'prev_junior_hs_level'=> 'required|string|max:2',
                'prev_senior_hs'=> 'nullable|string|max:255',
                'prev_senior_hs_level'=> 'nullable|string|max:2',           
                'career_strands_id'=> 'nullable|string|max:45',
            ]);

            //Saving data to user_guardian_details table.
            try
            { 
                if (UserGuardianDetail::find($id))
                    $profile = UserGuardianDetail::find($id);
                else
                    $profile = new UserGuardianDetail;

                $profile->id = $id;
                $profile->father_name = $request->father_name;
                $profile->father_contact_no = $request->father_contact_no;
                $profile->mother_name = $request->mother_name;
                $profile->mother_contact_no = $request->mother_contact_no;
                $profile->guardian_name = $request->guardian_name;
                $profile->guardian_contact_no = $request->guardian_contact_no;
                $profile->save();

                $request->session()->flash('user_guardian_message', 'Guardian information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_guardian_error', 'ERROR! Cannot create record, data already exists.');
            }

            //Saving data to user_educational_details table.
            try
            {
                // The prev_strand is a concatenated ID, so extract the proper ID.
                $prev_strand = explode (".", $request->prev_strand);

                if (UserEducationalDetail::find($id))
                    $profile = UserEducationalDetail::find($id);
                else
                    $profile = new UserEducationalDetail;

                $profile->id = $id;
                $profile->lrn_no = $request->lrn_no;
                $profile->prev_junior_hs = $request->prev_junior_hs;
                $profile->prev_junior_hs_level = $request->prev_junior_hs_level;
                $profile->prev_senior_hs = $request->prev_senior_hs;
                $profile->prev_senior_hs_level = $request->prev_senior_hs_level;
                $profile->prev_school_year = $request->prev_school_year;
                if ($prev_strand[0] != 'none')
                    $profile->career_strands_id = $prev_strand[1];
                else
                     $profile->career_strands_id = null;
                $profile->save();

                $request->session()->flash('user_educ_message', 'Educational background information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_educ_error', 'ERROR! Cannot create record, data already exists.');
            }
            return redirect()->route('profile_3');
        }

        //For profile page 3.
        else if ($uri == "profile_3/save")
        {
            //Input data validation.
            $this->validate(request(), [
                'height'=> 'required|string|max:5',
                'weight'=> 'required|string|max:5',
                'disabilities'=> 'nullable|string|max:100',
                'chronic_illness'=> 'nullable|string|max:100',
                'remarks'=> 'nullable|string|max:255',
            ]);

            //Saving data to user_health_details table.
            try
            {
                if (UserHealthDetail::find($id))
                    $profile = UserHealthDetail::find($id);
                else
                    $profile = new UserHealthDetail;

                $profile->id = $id;
                $profile->height = $request->height;
                $profile->weight = $request->weight;
                $profile->disabilities = $request->disabilities;
                $profile->chronic_illness = $request->chronic_illness;
                $profile->remarks = $request->remarks;
                $profile->save();

                $request->session()->flash('user_health_message', 'Health information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_health_error', 'ERROR! Cannot create record, data already exists.');
            }
            return redirect()->route('home');
        }
    }

	//Function to retrieve user details.
    public function view_info(Request $request)
    {
        //Keep the session for backing up after store.
        if ($request->session()->has('backUrl'))
        {
            $request->session()->keep('backUrl');
        }

        $uri = $request->path();

        // Profile 1
        if ($uri == 'profile_1' or $uri == '/profile_1/save')
        {
            $user_details = UserDetail::getUserDetails(Auth::id())->get();

            return view('profile_1', compact('user_details'));
        }
        // Profile 2
        else if ($uri == 'profile_2')
        {
            $user_guardian_details = UserGuardianDetail::getUserGuardianDetails(Auth::id())->get();
            $career_details = CareerStrand::getAllCareerStrands()->get('id', 'strand', 'track', 'tracks_id');

            $user_educational_details = UserEducationalDetail::getUserEducationalDetails(Auth::id())->get();

            if (count($user_educational_details) > 0 && $user_educational_details[0]->strand_id != null) {
                $user_educational_details = UserEducationalDetail::getUserEducationalDetailsComplete(Auth::id())->get();
            }
            return view('profile_2', compact('user_guardian_details', 'user_educational_details','career_details'));
        }
        // Profile 3
        else if ($uri == 'profile_3')
        {
            $user_health_details = UserHealthDetail::getUserHealthDetails(Auth::id())->get();

            return view('profile_3', compact('user_health_details'));            
        }

        
    }

    //Function to retrieve barangay details.
    public function fetch_info(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('barangays')
                ->join('municipalities', 'municipalities.id', '=', 'barangays.municipalities_id')
                ->join('provinces', 'provinces.id', '=', 'municipalities.provinces_id')
                ->select('barangays.id as id', 'barangays.name as name', 'municipalities.name as municipality', 'provinces.name as province')
                ->where('barangays.name', 'LIKE', "%{$query}%")
                ->get();
            
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li>'.$row->name. ' ('. $row->id . ') '. ', ' . $row->municipality . ', ' . $row->province . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
