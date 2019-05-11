<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AvailableCourse extends Model
{
	protected $table = 'available_courses';

  //Function to retrieve suggested career track/strand details.
  public static function getAvailableCourseDetails($id) {
    try {
      $available = DB::table('available_courses')
        ->join('career_strands', 'career_strands.id', '=', 'available_courses.career_strands_id')
        ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
        ->select('career_strands.career_tracks_id', 'career_strands.name as strand', 'career_strands.description as strand_desc', 'career_tracks.name as track', 'career_tracks.description as track_desc')
        ->where('available_courses.senior_high_schools_id', '=', $id)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $available;
  }

  //Function to retrieve a specific strand.
  public static function getCareerStrandDetails($school, $track) {
    try {
        $career_strand_details = DB::table('available_courses')
        ->join('career_strands', 'career_strands.id', '=', 'available_courses.career_strands_id')
        ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
        ->join('senior_high_schools', 'senior_high_schools.id', '=', 'available_courses.senior_high_schools_id')
          ->select('career_strands.id', 'career_strands.name as strand', 'career_strands.description', 'career_tracks.id as track_id', 'career_tracks.name as track', 'career_strands.created_at', 'career_strands.updated_at')
          ->where('available_courses.senior_high_schools_id', '=', $school)
          ->where('career_tracks.id', '=', $track)
          ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $career_strand_details;
  }

  //Function to retrieve suggested career track/strand details.
  public static function getAvailableCourseSchoolDetails($keyword) {
    try {
      $available = DB::table('available_courses')
        ->join('career_strands', 'career_strands.id', '=', 'available_courses.career_strands_id')
        ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
        ->join('senior_high_schools', 'senior_high_schools.id', '=', 'available_courses.senior_high_schools_id')
        ->select('career_strands.career_tracks_id', 'available_courses.career_strands_id', 'career_strands.name as strand', 'career_strands.description as strand_desc', 'career_tracks.name as track', 'career_tracks.description as track_desc', 'senior_high_schools.id as school_id', 'senior_high_schools.name as school', 'senior_high_schools.address', 'senior_high_schools.contact_no', 'senior_high_schools.contact_person', 'senior_high_schools.map')
        ->where('career_strands.name', 'like', '%' . $keyword . '%')
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $available;
  }

  //Function to retrieve suggested career track/strand details.
  public static function getAvailableCourseSchoolDetailsById($id) {
    try {
      $available = DB::table('available_courses')
        ->join('career_strands', 'career_strands.id', '=', 'available_courses.career_strands_id')
        ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
        ->join('senior_high_schools', 'senior_high_schools.id', '=', 'available_courses.senior_high_schools_id')
        ->select('career_strands.career_tracks_id', 'available_courses.career_strands_id', 'career_strands.name as strand',  'career_strands.category as strand_cat', 'career_strands.description as strand_desc', 'career_tracks.name as track', 'career_tracks.description as track_desc', 'senior_high_schools.id as school_id', 'senior_high_schools.name as school', 'senior_high_schools.address', 'senior_high_schools.contact_no', 'senior_high_schools.contact_person', 'senior_high_schools.map')
        ->where('available_courses.senior_high_schools_id', '=', $id)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $available;
  }
}
