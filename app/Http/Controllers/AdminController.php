<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use DB;
use App\User;
use App\UserDetail;
use App\CareerTrack;
use App\CareerStrand;
use App\Learner;
use App\LearnerValidation;
use App\SeniorHighSchool;
use App\Role;
use App\Personality;
use App\PersonalityTest;
use App\PersonalityAnswer;
use App\AvailableCourse;
use App\StrandPersonality;

class AdminController extends Controller
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

    //Function to retrieve course details by school.
    public function index(Request $request)
    {
        $id = Auth::id();
        $user = User::getUser($id)->get();
        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();
        
        return view('admin', compact('user', 'user_details'));
    }

    //Function to retrieve course details by school.
    public function index_2(Request $request)
    {
        $id = Auth::id();

        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();
        
        return view('admin_2', compact('user_details'));
    }

    //Function to retrieve admin page 3.
    public function index_3(Request $request)
    {
        $id = Auth::id();

        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();
        
        return view('admin_3', compact('user_details'));
    }

    //Function to retrieve data based on query.
    public function getQueryDetails(Request $request)
    {
        $id = Auth::id();

        $user = User::getUser($id)->get();
        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();

        // Query learners by personal details.
        if ($request->query_per != null || $request->query_per != '') {
            switch ($request->query_per) {
                case "fname":
                    $learner_details = Learner::getLearnersByPersonalDetail("first_name", $request->keyword)->get();
                    break;
                case "lname":
                    $learner_details = Learner::getLearnersByPersonalDetail("last_name", $request->keyword)->get();
                    break;
            }
        }

        // Query learners by enrollment details.
        elseif ($request->query_enr != null || $request->query_enr != '') {
            switch ($request->query_enr) {
                case "status":
                    if ($request->query_enr_sub == "ALL")
                        $learner_details = Learner::getLearnersByAll($request->query_enr_sub)->get();
                    else
                        $learner_details = Learner::getLearnersByEnrollmentStatus($request->query_enr_sub)->get();
                    break;
                case "grade":
                    $learner_details = Learner::getLearnersByGradeLevel($request->query_enr_sub)->get();
                    break;
                case "strand":
                    $learner_details = Learner::getLearnersByCareerStrand($request->query_enr_sub)->get();
                    break;
                case "track":
                    $learner_details = Learner::getLearnersByCareerTrack($request->query_enr_sub)->get();
                    break;
            }
        }

        if (isset($learner_details) && count($learner_details) > 0)
            return view('admin', compact('user', 'learner_details', 'user_details'));
        else
            return view('admin', compact('user', 'user_details'));
    }

    //Function to retrieve data based on query.
    public function getQueryDetails_2(Request $request)
    {
        $id = Auth::id();

        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();

        // Query learners by personal details.
        if ($request->query_per != null || $request->query_per != '') {
            switch ($request->query_per) {
                case "fname":
                    $learner_details = UserDetail::getUserDetailByQuery("first_name", $request->keyword)->get();
                    break;
                case "lname":
                    $learner_details = UserDetail::getUserDetailByQuery("last_name", $request->keyword)->get();
                    break;
            }
        }

        // Query learners by enrollment details.
        elseif ($request->query_enr != null || $request->query_enr != '') {
            switch ($request->query_enr) {
                case "status":
                    if ($request->query_enr_sub == '1')
                        $learner_details = User::getUserByQuery("active", $request->query_enr_sub)->get();
                    else
                        $learner_details = User::getUserOnlyByQuery("active", $request->query_enr_sub)->get();
                    break;
                case "roles":
                    $learner_details = User::getUserByQuery("roles_id", $request->query_enr_sub)->get();
                    break;
            }
        }

        if (isset($learner_details) && count($learner_details) > 0)
            return view('admin_2', compact('learner_details', 'user_details'));
        else
            return view('admin_2', compact('user_details'));
    }

    //Function to retrieve data based on query.
    public function getQueryDetails_3(Request $request)
    {
        $id = Auth::id();

        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();

        switch ($request->query_1) {

            // Query personalities.
            case "1":
                $result_type = "personalities";
                $query_details = Personality::getAllPersonalityDetails()->get();
                break;

            // Query test questions.
            case "2":
                $result_type = "questions";
                $query_details = PersonalityTest::getAllQuestionsByType($request->query_2)->get();
                break;

            // Query schools.
            case "3":
                $result_type = "schools";
                $query_details = SeniorHighSchool::getAllSeniorHighSchoolDetails()->get();
                break;

            // Query track and strands by school.
            case "4":
                $result_type = "strand_school_map";
                $query_details = AvailableCourse::getAvailableCourseSchoolDetailsById($request->query_2)->get();
                $strands = CareerStrand::getAllCareerStrands()->get();
                return view('admin_3', compact('result_type','query_details', 'strands', 'user_details'));
                break;

            // Query track and strands by school.
            case "5":
                $result_type = "strand_personality_map";
                $query_details = StrandPersonality::getMappingDetails($request->query_2)->get();
                $strands = CareerStrand::getAllCareerStrands()->get();
                return view('admin_3', compact('result_type','query_details', 'strands', 'user_details'));
                break;

            // Query roles.
            case "6":
                $result_type = "roles";
                $query_details = Role::getAllRoleDetails()->get();
                break;

            // Query all strands.
            case "7":
                $result_type = "strands";
                $query_details = CareerStrand::getAllCareerStrands()->get();
                break;
        }

        if (isset($query_details) && $count($query_details) > 0)
            return view('admin_3', compact('result_type','query_details', 'user_details'));
        else
            return view('admin_3', compact('user_details'));
    }

    //Function to retrieve career strands.
    public function admin_fetch_strand(Request $request)
    {

        if($request->get('query'))
        {
            $school_id = $request->get('school_id');

            $data = DB::table('available_courses')
            ->join('career_strands', 'career_strands.id', '=', 'available_courses.career_strands_id')
            ->join('senior_high_schools', 'senior_high_schools.id', '=', 'available_courses.senior_high_schools_id')
            ->select('career_strands.id', 'career_strands.career_tracks_id', 'career_strands.name as strand', 'career_strands.description as strand_desc', 'senior_high_schools.name')
            ->where('senior_high_schools.id', '=', $school_id)
            ->get();

            $output = '';
            foreach($data as $row)
            {
                $output .= '<option value="' . $row->id . '">' . $row->strand . '</option>';
            }
            echo $output;
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

        $user_details = UserDetail::getAdminUserDetails(Auth::id())->get();
        $schools = SeniorHighSchool::getAllSeniorHighSchoolDetails()->get();
        return view('profile_admin', compact('user_details', 'schools')); 
    }

    //Function to create new user details.
    public function save_info(Request $request)
    {
        //Get the current ID of user.
        $id = Auth::id();

        //Input data validation.
        $this->validate(request(), [
            'first_name'=> 'required|string|max:100',
            'middle_name'=> 'required|string|max:100',
            'last_name'=> 'required|string|max:100',
            'extension_name'=> 'nullable|string|max:10',
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
            $profile->barangays_id = $request->barangays_id;
            $profile->tel_no = $request->tel_no;
            $profile->mobile_no = $request->mobile_no;
            $profile->senior_high_schools_id = $request->school;
            $profile->save();

            $request->session()->flash('user_detail_message', 'Personal information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('user_detail_error', 'ERROR! Cannot create record, data already exists.');
        }
         return redirect()->route('home');
    }

    //Function to update enrollment status.
    public function admin_update_status(Request $request)
    {
        //Get the current ID of user.
        $id = Auth::id();

        $status_types = [
            'PENDING',
            'INCOMPLETE',
            'ENROLLED',
            'DEFERRED',
            'COMPLETE',
            'OTHERS'
        ];
        //Input data validation.
        $this->validate(request(), [
            'learnerid' => 'required|integer',
            'enroll_status'=> 'required|in:'. implode($status_types,','),
            'remarks'=> 'nullable|string|max:255',
        ]);

        if ($request->enroll_status != "COMPLETE") {
            //Saving data.
            try
            {
                if (LearnerValidation::find($request->learnerid))
                    $learner = LearnerValidation::find($request->learnerid);
                else
                    $learner = new LearnerValidation;
                
                $learner->id = $request->learnerid;
                $learner->status = $request->enroll_status;
                $learner->validated_by = $id;
                $learner->comments = $request->remarks;

                $learner->save();

                // Query token and send to email.
                $user = User::getUser($request->learnerid)->get();
                $userdetails = UserDetail::getUserDetails($request->learnerid)->get();

                if (count($user) > 0) {
                    $message_body = 'Hi '. $userdetails[0]->first_name . ' ' . $userdetails[0]->last_name . ',
                    Your enrollment status was updated to '. $request->enroll_status . ' with the following comments: '. $request->remarks . '. Please contact the school if you have questions/clarifications.';

                    Mail::raw($message_body, function($message) use ($user)
                    {
                        $message->subject('GPGSHS Enrollment Notice');
                        $message->from(config('mail.from.address'), config("app.name"));
                        $message->to($user[0]->email);
                    });
                }

                $request->session()->flash('user_detail_message', 'Personal information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_detail_error', 'ERROR! Cannot create record, data already exists.');
            }
        }
        else if ($request->enroll_status == "COMPLETE") {
            if (LearnerValidation::find($request->learnerid)) {
                $learner = LearnerValidation::find($request->learnerid);
                $delete1 = DB::delete("DELETE FROM learner_validations WHERE id = '$request->learnerid'");
                $delete2 = DB::delete("DELETE FROM learner_documents WHERE learners_id = '$request->learnerid'");
                $delete3 = DB::delete("DELETE FROM learners WHERE id = '$request->learnerid'");
            }
        }

         return back();
    }

    //Function to update enrollment status.
    public function admin_update_status_2(Request $request)
    {
        //Get the current ID of user.
        $id = Auth::id();

        if (isset($request->user_status)) {
            $status_types = [
                '0',
                '1'
            ];
            //Input data validation.
            $this->validate(request(), [
                'user_id' => 'required|integer',
                'user_status'=> 'required|in:'. implode($status_types,','),
            ]);

            try
            {
                $learner = User::find($request->user_id);
                $learner->active = $request->user_status;
                $learner->save();

                $request->session()->flash('user_detail_message', 'Personal information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_detail_error', 'ERROR! Cannot create record, data already exists.');
            }
        }
        else if (isset($request->user_role)) {
            $role_types = [
                '1',
                '2',
                '3'
            ];
            //Input data validation.
            $this->validate(request(), [
                'user_id_role' => 'required|integer',
                'user_role'=> 'required|in:'. implode($role_types,','),
            ]);

            try
            {
                $learner = User::find($request->user_id_role);
                $learner->roles_id = $request->user_role;
                $learner->save();

                $request->session()->flash('user_detail_message', 'Personal information successfully saved!');
            }
            catch (\Illuminate\Database\QueryException $e) {
                $request->session()->flash('user_detail_error', 'ERROR! Cannot create record, data already exists.');
            }
        }

         return back();
    }

    //Function to retrieve data based on query.
    public function roleUpdate(Request $request)
    {
        try {
            if (isset($request->edit_role_id) && Role::find($request->edit_role_id)) {
                $role = Role::find($request->edit_role_id);
                $role->description = $request->description;
                $role->save();
            }
            else if(isset($request->add_role_id)) {
                $role = new Role;
                $role->rolename = $request->rolename;
                $role->description = $request->description;
                $role->save();
            }
            else if(isset($request->delete_role_id) && Role::find($request->delete_role_id)) {
                $role = Role::find($request->delete_role_id);
                $role->delete();
            }
                $request->session()->flash('success_message', 'Role information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }

    //Function to retrieve data based on query.
    public function personalityUpdate(Request $request)
    {
        try {
            if (isset($request->edit_per_id) && Role::find($request->edit_per_id)) {
                $personality = Personality::find($request->edit_per_id);
                $personality->short_desc = $request->per_desc;
                $personality->long_desc = $request->per_long_desc;
                $personality->save();
            }
                $request->session()->flash('success_message', 'Role information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }

    //Function to retrieve data based on query.
    public function schoolUpdate(Request $request)
    {
        try {

            if (isset($request->edit_sch_id) && SeniorHighSchool::find($request->edit_sch_id)) {
                $school = SeniorHighSchool::find($request->edit_sch_id);
                $school->name = $request->sch_name;
                $school->address = $request->sch_address;
                $school->contact_no = $request->sch_contact;
                $school->contact_person = $request->sch_person;
                $school->map = $request->sch_map;
                $school->save();
            }
            else if(isset($request->add_sch_id)) {
                $school = new SeniorHighSchool;
                $school->name = $request->sch_name;
                $school->address = $request->sch_address;
                $school->contact_no = $request->sch_contact;
                $school->contact_person = $request->sch_person;
                $school->map = $request->sch_map;

                $school->save();
            }
            else if(isset($request->delete_sch_id) && SeniorHighSchool::find($request->delete_sch_id)) {
                $school = SeniorHighSchool::find($request->delete_sch_id);
                $school->delete();
            }
                $request->session()->flash('success_message', 'School information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }

    //Function to retrieve data based on query.
    public function personalityQuestionUpdate(Request $request)
    {
        try {

            if (isset($request->edit_qst_id) && PersonalityTest::find($request->edit_qst_id)) {
                $pQuestion = PersonalityTest::find($request->edit_qst_id);
                $pQuestion->question = $request->qst_question;
                $pQuestion->save();

                $pAnswer = PersonalityAnswer::where('personality_questions_id', $request->edit_qst_id)->first();
                $pAnswer->a = $request->qst_answer_a;
                $pAnswer->b = $request->qst_answer_b;
                $pAnswer->save();
            }
            else if(isset($request->add_qst_id)) {
                $pQuestion = new PersonalityTest;
                $pQuestion->question = $request->qst_question;
                $pQuestion->mbti = $request->add_qst_mbti_type;
                $pQuestion->save();

                $pAnswer = new PersonalityAnswer;
                $pAnswer->a = $request->qst_answer_a;
                $pAnswer->b = $request->qst_answer_b;
                $pAnswer->personality_questions_id = $pQuestion->id;
                $pAnswer->save();
            }
            else if(isset($request->delete_qst_id) && PersonalityTest::find($request->delete_qst_id)) {
                $pAnswer = PersonalityAnswer::where('personality_questions_id', $request->delete_qst_id)->first();
                $pAnswer->delete();

                $pQuestion = PersonalityTest::find($request->delete_qst_id);
                $pQuestion->delete();
            }
                $request->session()->flash('success_message', 'Test question information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }

    //Function to retrieve school details.
    public function fetch_school_details(Request $request)
    {
        $data = DB::table('senior_high_schools')
        ->select('senior_high_schools.id', 'senior_high_schools.name')
        ->get();
        
        $output = "";
        foreach($data as $row)
        {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }

    //Function to retrieve data based on query.
    public function strandUpdate(Request $request)
    {
        try {
            if (isset($request->edit_str_id) && CareerStrand::find($request->edit_str_id)) {
                $strand = CareerStrand::find($request->edit_str_id);
                $strand->name = $request->str_name;
                $strand->description = $request->str_desc;
                $strand->category = $request->str_cat;
                $strand->career_tracks_id = $request->edit_str_trk;
                $strand->save();
            }
            else if(isset($request->add_str_id)) {
                $strand = new CareerStrand;
                $strand->name = $request->str_name;
                $strand->description = $request->str_desc;
                $strand->category = $request->str_cat;
                $strand->career_tracks_id = $request->add_str_trk_id;

                $strand->save();
            }
            else if(isset($request->delete_str_id) && CareerStrand::find($request->delete_str_id)) {
                $school = CareerStrand::find($request->delete_str_id);
                $school->delete();
            }
                $request->session()->flash('success_message', 'Strand information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }

    //Function to retrieve data based on query.
    public function schoolStrandMappingUpdate(Request $request)
    {
        try {
            if(isset($request->add_strsch_id)) {
                $mapping = new AvailableCourse;
                $mapping->senior_high_schools_id = $request->add_strsch_id;
                $mapping->career_strands_id = $request->add_strsch_name_id;
                $mapping->save();
            }
            else if(isset($request->delete_strsch_id_1) && isset($request->delete_strsch_id_2)) {
            $mapping = DB::delete("DELETE FROM available_courses WHERE senior_high_schools_id = '$request->delete_strsch_id_2' AND career_strands_id = '$request->delete_strsch_id_1';"
                );
            }
                $request->session()->flash('success_message', 'Mapping information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }

    //Function to retrieve personality details.
    public function fetch_personality_details(Request $request)
    {
        $data = DB::table('personalities')
        ->select('personalities.id', 'personalities.personality_type')
        ->get();
        
        $output = "";
        foreach($data as $row)
        {
            $output .= '<option value="' . $row->id . '">' . $row->personality_type . '</option>';
        }
        echo $output;
    }

    //Function to retrieve data based on query.
    public function personalityStrandMappingUpdate(Request $request)
    {
        try {
            if(isset($request->add_strper_id)) {
                $mapping = new StrandPersonality;
                $mapping->personalities_id = $request->add_strper_id;
                $mapping->career_strands_id = $request->add_strper_name_id;
                $mapping->save();
            }
            else if(isset($request->delete_strper_id_1) && isset($request->delete_strper_id_2)) {
            $mapping = DB::delete("DELETE FROM strands_personalities WHERE personalities_id = '$request->delete_strper_id_2' AND career_strands_id = '$request->delete_strper_id_1';"
                );
            }
                $request->session()->flash('success_message', 'Mapping information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('error_message', 'ERROR! Cannot create record, data already exists.');
        }
        return back();
    }
}
