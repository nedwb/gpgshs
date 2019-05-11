<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CareerStrand extends Model
{
	protected $table = 'career_strands';

    //Function to retrieve a specific strand.
    public static function getCareerStrandDetails($id) {
      try {
          $career_strand_details = DB::table('career_strands')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
          	->select('career_strands.id', 'career_strands.name as strand', 'career_strands.description', 'career_tracks.id as track_id', 'career_tracks.name as track', 'career_strands.created_at', 'career_strands.updated_at')
          	->where('career_strands.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_strand_details;
    }

    //Function to retrieve a specific strand by name.
    public static function getCareerStrandDetailsByName($name) {
      try {
          $career_strand_details = DB::table('career_strands')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
            ->select('career_strands.id', 'career_strands.name as strand', 'career_strands.description', 'career_tracks.name as track', 'career_strands.created_at', 'career_strands.updated_at')
            ->where('career_strands.name', 'like', '%'. $name . '%')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_strand_details;
    }

    //Function to retrieve all strands.
    public static function getAllCareerStrands() {
      try {
          $career_strand_details = DB::table('career_strands')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
            ->select('career_strands.id', 'career_strands.name as strand', 'career_strands.description', 'career_strands.category', 'career_strands.career_tracks_id', 'career_tracks.name as track', 'career_strands.created_at', 'career_strands.updated_at', 'career_tracks.id as tracks_id')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_strand_details;
    }

    //Function to strands details by category.
    public static function getStrandDetailsByPlanCategory($category) {
      try {
          $career_strand_details = DB::table('career_strands')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
            ->select('career_strands.id', 'career_strands.name as strand', 'career_strands.description', 'career_tracks.name as track', 'career_strands.created_at', 'career_strands.updated_at')
            ->where('career_strands.category', 'like', '%'. $category . '%')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_strand_details;
    }

    //Function to retrieve a specific strand.
    public static function getCareerStrandDetailsByTrack($id) {
      try {
          $career_strand_details = DB::table('career_strands')
            ->join('career_tracks', 'career_tracks.id', '=', 'career_strands.career_tracks_id')
            ->select('career_strands.id', 'career_strands.name as strand', 'career_strands.description', 'career_tracks.id as track_id', 'career_tracks.name as track', 'career_strands.created_at', 'career_strands.updated_at')
            ->where('career_tracks.id', '=', $id)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_strand_details;
    }
}
