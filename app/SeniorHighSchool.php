<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeniorHighSchool extends Model
{
	protected $table = 'senior_high_schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
        'id', 'name', 'address', 'contact_no', 'contact_person', 'map',
    ];

    //Function to retrieve a specific school.
    public static function getSeniorHighSchoolDetails($id) {
      try {
          $school_details = DB::table('senior_high_schools')
          	->select('senior_high_schools.id', 'senior_high_schools.name',
            'senior_high_schools.address', 'senior_high_schools.contact_no', 'senior_high_schools.contact_person', 'senior_high_schools.created_at', 'senior_high_schools.updated_at')
          	->where('senior_high_schools.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $school_details;
    }

    //Function to retrieve all schools.
    public static function getAllSeniorHighSchoolDetails() {
      try {
          $school_details = DB::table('senior_high_schools')
            ->select('senior_high_schools.id', 'senior_high_schools.name',
            'senior_high_schools.address', 'senior_high_schools.contact_no', 'senior_high_schools.contact_person', 'senior_high_schools.map', 'senior_high_schools.created_at', 'senior_high_schools.updated_at')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $school_details;
    }
}
