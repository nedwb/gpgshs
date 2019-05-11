<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserGuardianDetail extends Model
{
	protected $table = 'user_guardian_details';

    //Function to retrieve a specific user
    public static function getUserGuardianDetails($id) {
      try {
          $user_guardian_details = DB::table('user_guardian_details')
          	->select('user_guardian_details.id', 'user_guardian_details.father_name', 'user_guardian_details.mother_name', 'user_guardian_details.guardian_name', 'user_guardian_details.father_contact_no', 'user_guardian_details.mother_contact_no', 'user_guardian_details.guardian_contact_no', 'user_guardian_details.created_at', 'user_guardian_details.updated_at')
          	->where('user_guardian_details.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_guardian_details;
    }
}