<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use DateTime;
use DB;
use Redirect;
use PDF;
use ZipArchive;

use App\Personality;
use App\StrandPersonality;
use App\Learner;
use App\LearnerValidation;
use App\User;
use App\UserDetail;
use App\CareerStrand;
use App\SeniorHighSchool;
use App\UserGuardianDetail;
use App\UserEducationalDetail;
use App\UserHealthDetail;
use App\LearnerDocument;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Check if data exists.
    public function enrollment_precheck(Request $request)
    {
        $id = Auth::id();
        $user_details = UserDetail::getUserDetails($id)->get();

        // Get all schools.
        $schools = SeniorHighSchool::getAllSeniorHighSchoolDetails()->get();
        // Get all strands.
        $strands = CareerStrand::getAllCareerStrands()->get();
        // Check if user has personality record.
        $learner_ids = Learner::checkLearnersIds($id)->get();

        // Check if user has data from learners table.
        if (count($learner_ids) > 0)
        {
            $mbti_id = $learner_ids[0]->personalities_id;
            $mbti_details = Personality::getPersonalityDetailsById($mbti_id)->get();
            
            // Check if user has a record in the learners table, if so, means user is already enrolled and cannot enroll again.
            if ($learner_ids[0]->school_year != null || $learner_ids[0]->senior_high_schools_id != null || $learner_ids[0]->career_strands_id != null)
            {
                $learner_details = Learner::checkLearnersDetails($id)->get();

                return view('enrollment', compact('user_details','mbti_details', 'strands', 'schools','learner_details'));
            }

            // User is not yet enrolled and can do the enrollment process.
            else
                return view('enrollment', compact('user_details','mbti_details', 'strands', 'schools'));
        }
        else
        {
            return view('enrollment', compact('user_details', 'strands', 'schools'));
        }
    }

    // Check if data exists.
    public function enrollment_advisor(Request $request)
    {
        $id = Auth::id();
        $user_details = UserDetail::getUserDetails($id)->get();
        $learner_ids = Learner::checkLearnersIds($id)->get();

        // Check if user has data from learners table.
        if (count($learner_ids) > 0)
        {
            $mbti_id = $learner_ids[0]->personalities_id;

            $recommendation = $request->ncae;
            $plan = $request->plan;

            // Suggest based on matching the personality type and learner's plan.
            if ($plan == "unknown") {
                $suggested_career = StrandPersonality::getMappingDetails($mbti_id)->get();
            }
            else {
                $suggested_career = StrandPersonality::getMappingDetailsByPersonalityAndCategory($mbti_id, $plan)->get();
            }

            // If no match found, suggest based on learner's plan alone.
            if (count($suggested_career) <=0) {
                $suggested_career = CareerStrand::getStrandDetailsByPlanCategory($plan)->get();
            }
            // If still no match, just give the NCAE suggestion.
            if (count($suggested_career) <= 0) {
                $suggested_career = CareerStrand::getCareerStrandDetailsByName($recommendation)->get();
            }

            return view('advisor', compact('user_details', 'suggested_career'));
        }
        else
        {
            return view('advisor', compact('user_details'));
        }
    }

    //Function to retrieve course details by school.
    public function enrollment_fetch_course(Request $request)
    {
        if($request->get('query'))
        {
            $school_id = $request->get('query');
            $data = DB::table('available_courses')
            ->join('career_strands', 'career_strands.id', '=', 'available_courses.career_strands_id')
            ->join('senior_high_schools', 'senior_high_schools.id', '=', 'available_courses.senior_high_schools_id')
            ->select('career_strands.id', 'career_strands.career_tracks_id', 'career_strands.name as strand', 'career_strands.description as strand_desc', 'senior_high_schools.name')
            ->where('senior_high_schools.id', '=', $school_id)
            ->get();
            
            $output = '<option value="none"></option>';
            foreach($data as $row)
            {
                $output .= '<option value="' . $row->id . '">' . $row->strand . '</option>';
            }
            echo $output;
        }
    }
    
    //Function to display enrollment details.
    public function enrollment_verify_dtls(Request $request)
    {
        $id = Auth::id();

        // Get all user details.
        $user_details = UserDetail::getUserDetails($id)->get();
        $user_guardian_details = UserGuardianDetail::getUserGuardianDetails($id)->get();
        //$user_educational_details = UserEducationalDetail::getUserEducationalDetailsComplete($id)->get();
        $user_health_details = UserHealthDetail::getUserHealthDetails($id)->get();
        $career_details = CareerStrand::getAllCareerStrands()->get();

        $user_educational_details = UserEducationalDetail::getUserEducationalDetails(Auth::id())->get();

        if (count($user_educational_details) > 0 && $user_educational_details[0]->strand_id != null) {
                $user_educational_details = UserEducationalDetail::getUserEducationalDetailsComplete(Auth::id())->get();
        }

        // Get key enrollment details.
        $enroll_year = $request->year;
        $enroll_grade = $request->grade;
        $enroll_school = SeniorHighSchool::getSeniorHighSchoolDetails($request->school)->get();
        $enroll_course = CareerStrand::getCareerStrandDetails($request->course)->get();
        
        return view('enrollment', compact('user_details', 'user_guardian_details', 'user_educational_details', 'user_health_details', 'career_details', 'enroll_school', 'enroll_course', 'enroll_year', 'enroll_grade'));
    }

    //Function to display enrollment details.
    public function enrollment_print_dtls(Request $request)
    {
        if ($request->learner_id == '')
            $id = Auth::id();
        else
            $id = $request->learner_id;

        // Get all user details.
        $user_details = UserDetail::getUserDetails($id)->get();
        $user_guardian_details = UserGuardianDetail::getUserGuardianDetails($id)->get();
        $user_health_details = UserHealthDetail::getUserHealthDetails($id)->get();
        $career_details = CareerStrand::getAllCareerStrands()->get();
        $enroll_details = Learner::checkLearnersDetails($id)->get();
        $learner_docs = LearnerDocument::getDetailsByLearnersId($id)->get();

        $user_educational_details = UserEducationalDetail::getUserEducationalDetails($id)->get();

        if (count($user_educational_details) > 0 && $user_educational_details[0]->strand_id != null) {
                $user_educational_details = UserEducationalDetail::getUserEducationalDetailsComplete($id)->get();
        }

        $pdf = PDF::loadView('enrollment_pdf', compact('user_details', 'user_guardian_details', 'user_educational_details', 'user_health_details', 'career_details', 'enroll_details'));

        $pdf->save(storage_path('/app/storage/forms/' . $user_details[0]->last_name . '.pdf'));

        // Zip all files to download.
        $zip_file = $user_details[0]->last_name . '.zip';

        // Initializing PHP class
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($learner_docs as $file) {
            $actual_name = $file->filename . '.' . $file->extension;
            $path_filename =  '/app/storage/forms/' . $actual_name;
            $zip->addFile(storage_path($path_filename), $actual_name);
        }
        $zip->addFile(storage_path('/app/storage/forms/' . $user_details[0]->last_name . '.pdf'),  $user_details[0]->last_name . '.pdf');
        $zip->close();

        return response()->download($zip_file);
    }

    //Function to display enrollment details.
    public function enrollment_show_dtls(Request $request)
    {
        $id = Auth::id();

        // Get all user details.
        $user_details = UserDetail::getUserDetails($id)->get();
        $enroll_details = Learner::checkLearnersDetails($id)->get();
        
        return view('enrollment_reqs', compact('user_details', 'enroll_details'));
    }

    // Save enrollment data.
    public function enrollment_save(Request $request)
    {
        $id = Auth::id();

        //Saving data to learners table.
        try
        {
            if (Learner::find($id))
                $learner = Learner::find($id);
            else
                $learner = new Learner;
            
            $learner->id = $id;
            $learner->school_year = $request->school_year;
            $learner->grade = $request->grade;
            $learner->senior_high_schools_id = $request->school_name_hid;
            $learner->career_strands_id = $request->course_hid;
            $learner->save();

            // Populate learner_validations table.
            if (LearnerValidation::find($id))
                $learner_validation = LearnerValidation::find($id);
            else
                $learner_validation = new LearnerValidation;

            $learner_validation->id = $id;
            $learner_validation->status = "PENDING";
            $learner_validation->save();

            // Query token and send to email.
            $user = User::getUser($id)->get();
            $userdetails = UserDetail::getUserDetails($id)->get();

            if (count($user) > 0) {
                $message_body = '
                Hi '. $userdetails[0]->first_name . ' ' . $userdetails[0]->last_name . ',
                Thank you for enrolling. Your enrollment is now under review and you will received another email once your enrollment is confirmed by one of the school administrators.';
                
                Mail::raw($message_body, function($message) use ($user)
                {
                    $message->subject('GPGSHS Enrollment Notice');
                    $message->from(config('mail.from.address'), config("app.name"));
                    $message->to($user[0]->email);
                });
            }

            $request->session()->flash('enroll_message', 'You have successfully enrolled. Please upload scanned copy of the requirements.');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('enroll_message', 'ERROR! Cannot create record, data already exists.');
        }
         return redirect()->route('enrollment_reqs');
    }

    // Save enrollment data.
    public function enrollment_update(Request $request)
    {
        $id = Auth::id();

        //Saving data to learners table.
        try
        {
            if (Learner::find($id))
                $learner = Learner::find($id);
            else
                $learner = new Learner;
            
            $learner->id = $id;
            $learner->school_year = $request->school_year;
            $learner->senior_high_schools_id = $request->school_name_hid;
            $learner->career_strands_id = $request->track_hid;
            $learner->save();

            $request->session()->flash('user_detail_message', 'Personal information successfully saved!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('user_detail_error', 'ERROR! Cannot create record, data already exists.');
        }
         return redirect()->route('home');
    }

    // Display requirements page.
    public function enrollment_reqs(Request $request)
    {
        return view('enrollment_reqs');
    }
}
