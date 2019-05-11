<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Learner extends Model
{
	protected $table = 'learners';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'id', 'school_year', 'grade', 'senior_high_schools_id', 'career_strands_id', 'personalities_id',
	];

    //Function to retrieve personality details.
  	public static function checkLearnersIds($id) {
	    try {
	      $learners = DB::table('learners')
	        ->select('learners.id', 'learners.school_year', 'learners.grade', 'learners.senior_high_schools_id', 'learners.career_strands_id', 'learners.personalities_id')
	        ->where('learners.id', '=', $id)
	        ->distinct();
	    }
	    catch(PDOException $exception) {
	        die(var_dump($exception->getMessage()));
	    }
	    return $learners;
  	}
    
    //Function to retrieve personality details.
  	public static function checkLearnersDetails($id) {
	    try {
	      $learners = DB::table('learners')
	      	->join('senior_high_schools', 'senior_high_schools.id', '=', 'learners.senior_high_schools_id')
	      	->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
	      	->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
	        ->select('learners.id', 'learners.school_year', 'learners.grade', 'learners.senior_high_schools_id', 'learners.career_strands_id', 'learners.personalities_id', 'senior_high_schools.name as school', 'career_strands.name as course', 'career_tracks.name as track')
	        ->where('learners.id', '=', $id)
	        ->distinct();
	    }
	    catch(PDOException $exception) {
	        die(var_dump($exception->getMessage()));
	    }
	    return $learners;
  	}

    //Function to retrieve a details.
    public static function getLearnersByPersonalDetail($key, $value) {
      try {
          $details = DB::table('learners')
            ->join('user_details', 'user_details.id', '=', 'learners.id')
            ->join('user_educational_details', 'user_educational_details.id', '=', 'learners.id')
            ->join('learner_validations', 'learner_validations.id', '=', 'learners.id')
            ->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
            ->select('learners.id', 'user_educational_details.lrn_no', 'user_details.first_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.middle_name', 'learners.grade', 'career_strands.name as strand', 'learner_validations.status', 'learner_validations.comments' )
            ->where('user_details.' . $key , 'like', '%' . $value . '%')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }

    //Function to retrieve a details.
    public static function getLearnersByGradeLevel($value) {
      try {
          $details = DB::table('learners')
            ->join('user_details', 'user_details.id', '=', 'learners.id')
            ->join('user_educational_details', 'user_educational_details.id', '=', 'learners.id')
            ->join('learner_validations', 'learner_validations.id', '=', 'learners.id')
            ->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
            ->select('learners.id', 'user_educational_details.lrn_no', 'user_details.first_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.middle_name', 'learners.grade', 'career_strands.name as strand', 'learner_validations.status', 'learner_validations.comments' )
            ->where('learners.grade' , '=', $value)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }

    //Function to retrieve a details.
    public static function getLearnersByEnrollmentStatus($value) {
      try {
          $details = DB::table('learners')
            ->join('user_details', 'user_details.id', '=', 'learners.id')
            ->join('user_educational_details', 'user_educational_details.id', '=', 'learners.id')
            ->join('learner_validations', 'learner_validations.id', '=', 'learners.id')
            ->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
            ->select('learners.id', 'user_educational_details.lrn_no', 'user_details.first_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.middle_name', 'learners.grade', 'career_strands.name as strand', 'learner_validations.status', 'learner_validations.comments' )
            ->where('learner_validations.status', 'like', '%' . $value . '%')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }

    //Function to retrieve a details.
    public static function getLearnersByAll($value) {
      try {
          $details = DB::table('learners')
            ->join('user_details', 'user_details.id', '=', 'learners.id')
            ->join('user_educational_details', 'user_educational_details.id', '=', 'learners.id')
            ->join('learner_validations', 'learner_validations.id', '=', 'learners.id')
            ->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
            ->select('learners.id', 'user_educational_details.lrn_no', 'user_details.first_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.middle_name', 'learners.grade', 'career_strands.name as strand', 'learner_validations.status', 'learner_validations.comments' )
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }

    //Function to retrieve a details.
    public static function getLearnersByCareerStrand($value) {
      try {
          $details = DB::table('learners')
            ->join('user_details', 'user_details.id', '=', 'learners.id')
            ->join('user_educational_details', 'user_educational_details.id', '=', 'learners.id')
            ->join('learner_validations', 'learner_validations.id', '=', 'learners.id')
            ->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
            ->select('learners.id', 'user_educational_details.lrn_no', 'user_details.first_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.middle_name', 'learners.grade', 'career_strands.name as strand', 'learner_validations.status', 'learner_validations.comments' )
            ->where('learners.career_strands_id', '=', $value)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }

    //Function to retrieve a details.
    public static function getLearnersByCareerTrack($value) {
      try {
          $details = DB::table('learners')
            ->join('user_details', 'user_details.id', '=', 'learners.id')
            ->join('user_educational_details', 'user_educational_details.id', '=', 'learners.id')
            ->join('learner_validations', 'learner_validations.id', '=', 'learners.id')
            ->join('career_strands', 'career_strands.id', '=', 'learners.career_strands_id')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
            ->select('learners.id', 'user_educational_details.lrn_no', 'user_details.first_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.middle_name', 'learners.grade', 'career_strands.name as strand', 'learner_validations.status', 'learner_validations.comments' )
            ->where('career_tracks.id', '=', $value)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }
}
