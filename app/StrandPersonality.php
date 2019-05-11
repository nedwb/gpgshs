<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StrandPersonality extends Model
{
	protected $table = 'strands_personalities';

  //Function to retrieve suggested career track/strand details.
  public static function getMappingDetails($id) {
    try {
      $suggested = DB::table('strands_personalities')
        ->join('career_strands', 'career_strands.id', '=', 'strands_personalities.career_strands_id')
        ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
        ->join('personalities', 'personalities.id', '=', 'strands_personalities.personalities_id')
        ->select('career_strands.career_tracks_id', 'strands_personalities.career_strands_id', 'strands_personalities.personalities_id', 'career_strands.name as strand', 'career_strands.description as strand_desc', 'career_tracks.name as track', 'career_tracks.description as track_desc', 'personalities.id', 'personalities.personality_type')
        ->where('strands_personalities.personalities_id', '=', $id)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $suggested;
  }

  //Function to retrieve specific career track/strand details by Personality type and category.
  public static function getMappingDetailsByPersonalityAndCategory($id, $category) {
    try {
      $suggested = DB::table('strands_personalities')
        ->join('career_strands', 'career_strands.id', '=', 'strands_personalities.career_strands_id')
        ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
        ->select('career_strands.career_tracks_id', 'strands_personalities.career_strands_id', 'strands_personalities.personalities_id', 'career_strands.name as strand', 'career_strands.description as strand_desc', 'career_tracks.name as track', 'career_tracks.description as track_desc')
        ->where('strands_personalities.personalities_id', '=', $id)
        ->where('career_strands.category', 'like', '%'. $category . '%')
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $suggested;
  }
}
