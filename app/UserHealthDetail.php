<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserHealthDetail extends Model
{
	protected $table = 'user_health_details';

    //Function to retrieve a specific user
    public static function getUserHealthDetails($id) {
      try {
          $user_health_details = DB::table('user_health_details')
          	->select('user_health_details.id', 'user_health_details.height', 'user_health_details.weight', 'user_health_details.disabilities', 'user_health_details.chronic_illness', 'user_health_details.remarks', 'user_health_details.created_at', 'user_health_details.updated_at')
          	->where('user_health_details.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_health_details;
    }
}
