<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
	protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'id', 'rolename', 'description',
    ];

    //Function to retrieve a track details.
    public static function getRoleDetailsById($id) {
      try {
          $details = DB::table('roles')
          	->select('roles.id', 'roles.rolename',
            'roles.description', 'roles.created_at', 'roles.updated_at')
          	->where('roles.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }

    //Function to retrieve all track details.
    public static function getAllRoleDetails() {
      try {
          $details = DB::table('roles')
            ->select('roles.id', 'roles.rolename',
            'roles.description', 'roles.created_at', 'roles.updated_at')
            ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }
}
