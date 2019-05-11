<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personality extends Model
{
	protected $table = 'personalities';

  //Function to retrieve personality details by mbti type.
  public static function getPersonalityDetailsByType($mbti) {
    try {
      $personality = DB::table('personalities')
        ->select('personalities.id', 'personalities.personality_type', 'personalities.short_desc', 'personalities.long_desc')
        ->where('personalities.personality_type', '=', $mbti)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $personality;
  }

  //Function to retrieve personality details by id.
  public static function getPersonalityDetailsById($id) {
    try {
      $personality = DB::table('personalities')
        ->select('personalities.id', 'personalities.personality_type', 'personalities.short_desc', 'personalities.long_desc')
        ->where('personalities.id', '=', $id)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $personality;
  }

  //Function to retrieve all personality details.
  public static function getAllPersonalityDetails() {
    try {
      $personality = DB::table('personalities')
        ->select('personalities.id', 'personalities.personality_type', 'personalities.short_desc', 'personalities.long_desc')
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $personality;
  }
}
