<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserDetail extends Model
{
	protected $table = 'user_details';

    //Function to retrieve a specific user
    public static function getUserDetails($id) {
      try {
          $user_details = DB::table('user_details')
            ->join('barangays', 'barangays.id', '=', 'user_details.barangays_id')
            ->join('municipalities', 'municipalities.id', '=', 'barangays.municipalities_id')
            ->join('provinces', 'provinces.id', '=', 'municipalities.provinces_id')
          	->select('user_details.id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.tel_no', 'user_details.mobile_no', 'user_details.address', 'user_details.barangays_id', 'barangays.name as barangay', 'municipalities.name as municipality', 'provinces.name as province', 'user_details.birth_date', 'user_details.age', 'user_details.sex', 'user_details.religion', 'user_details.mother_tongue', 'user_details.ip_group', 'user_details.created_at', 'user_details.updated_at')
          	->where('user_details.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_details;
    }

    //Function to retrieve a specific user
    public static function getAdminUserDetails($id) {
      try {
          $user_details = DB::table('user_details')
            ->join('barangays', 'barangays.id', '=', 'user_details.barangays_id')
            ->join('municipalities', 'municipalities.id', '=', 'barangays.municipalities_id')
            ->join('provinces', 'provinces.id', '=', 'municipalities.provinces_id')
            ->join('senior_high_schools', 'senior_high_schools.id', '=', 'user_details.senior_high_schools_id')
            ->select('user_details.id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.tel_no', 'user_details.mobile_no', 'user_details.address', 'user_details.barangays_id', 'barangays.name as barangay', 'municipalities.name as municipality', 'provinces.name as province', 'user_details.birth_date', 'user_details.age', 'user_details.sex', 'user_details.religion', 'user_details.mother_tongue', 'user_details.ip_group', 'senior_high_schools.id as school_id', 'senior_high_schools.name as school', 'user_details.created_at', 'user_details.updated_at')
            ->where('user_details.id', '=', $id)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_details;
    }

    //Function to retrieve a specific user
    public static function getUserDetailByQuery($key, $value) {
      try {
          $user_details = DB::table('user_details')
            ->join('users', 'users.id', '=', 'user_details.id')
            ->join('roles', 'roles.id', '=', 'users.roles_id')
            ->select('user_details.id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.extension_name', 'user_details.tel_no', 'user_details.mobile_no', 'user_details.birth_date', 'user_details.age', 'user_details.sex', 'user_details.religion', 'user_details.mother_tongue', 'user_details.ip_group', 'users.active', 'users.email', 'roles.id as roles_id', 'roles.rolename', 'user_details.created_at', 'user_details.updated_at')
            ->where('user_details.' . $key ,'=', $value)
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $user_details;
    }
}
