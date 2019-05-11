<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CareerTrack extends Model
{
	protected $table = 'career_tracks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'id', 'name', 'description',
    ];

    //Function to retrieve a track details.
    public static function getCareerTrackDetails($id) {
      try {
          $career_track_details = DB::table('career_tracks')
          	->select('career_tracks.id', 'career_tracks.name',
            'career_tracks.description', 'career_tracks.created_at', 'career_tracks.updated_at')
          	->where('career_tracks.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_track_details;
    }

    //Function to retrieve all track details.
    public static function getCareerAllTrackDetails() {
      try {
          $career_track_details = DB::table('career_tracks')
            ->select('career_tracks.id', 'career_tracks.name',
            'career_tracks.description', 'career_tracks.created_at', 'career_tracks.updated_at')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $career_track_details;
    }
}
