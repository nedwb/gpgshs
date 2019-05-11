<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'token', 'active', 'roles_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Overrides the method to ignore the remember token.
    */
    
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

    //Function to retrieve a specific user
    public static function getUser($id) {
      try {
          $users = DB::table('users')
          ->join('roles', 'roles.id', '=', 'users.roles_id')
          ->select('users.id', 'users.email', 'users.roles_id', 'users.token', 'users.active', 'roles.rolename')
          ->where('users.id', '=', $id)
          ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $users;
    }

    //Function to retrieve a specific user
    public static function getUserByQuery($key, $value) {
      try {
          $users = DB::table('users')
          ->join('roles', 'roles.id', '=', 'users.roles_id')
          ->join('user_details', 'user_details.id', '=', 'users.id')
          ->select('users.id', 'users.email', 'users.roles_id', 'users.token', 'users.active', 'roles.rolename', 'user_details.first_name','user_details.last_name','user_details.middle_name','user_details.extension_name','users.email')
          ->where('users.' . $key , '=', $value)
          ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $users;
    }

    //Function to retrieve a specific user
    public static function getUserOnlyByQuery($key, $value) {
      try {
          $users = DB::table('users')
          ->join('roles', 'roles.id', '=', 'users.roles_id')
          ->select('users.id', 'users.email', 'users.roles_id', 'users.token', 'users.active', 'roles.rolename')
          ->where('users.' . $key , '=', $value)
          ->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $users;
    }
}
