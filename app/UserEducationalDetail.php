<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserEducationalDetail extends Model
{
	protected $table = 'user_educational_details';

    //Function to retrieve data.
    public static function getUserEducationalDetails($id) {
      try {
          $user_educational_details = DB::table('user_educational_details')
            ->select('user_educational_details.id', 'user_educational_details.lrn_no', 'user_educational_details.prev_junior_hs', 'user_educational_details.prev_junior_hs_level', 'user_educational_details.prev_senior_hs', 'user_educational_details.prev_senior_hs_level', 'user_educational_details.prev_school_year', 'user_educational_details.career_strands_id as strand_id', 'user_educational_details.created_at', 'user_educational_details.updated_at')
            ->where('user_educational_details.id', '=', $id)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_educational_details;
    }

    //Function to retrieve complete data.
    public static function getUserEducationalDetailsComplete($id) {
      try {
          $user_educational_details = DB::table('user_educational_details')
            ->join('career_strands', 'career_strands.id', '=', 'user_educational_details.career_strands_id')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
          	->select('user_educational_details.id', 'user_educational_details.lrn_no', 'user_educational_details.prev_junior_hs', 'user_educational_details.prev_junior_hs_level', 'user_educational_details.prev_senior_hs', 'user_educational_details.prev_senior_hs_level', 'user_educational_details.prev_school_year', 'user_educational_details.created_at', 'user_educational_details.updated_at', 'career_strands.id as strand_id', 'career_strands.name as strand', 'career_tracks.id as track_id', 'career_tracks.name as track')
          	->where('user_educational_details.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_educational_details;
    }
}