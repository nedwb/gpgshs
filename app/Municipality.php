<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Municipality extends Model
{
	protected $table = 'municipalities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'id', 'name', 'zipcode', 'provinces_id',
    ];

    //Function to retrieve a specific user
    public static function getMunicipalityDetails($id) {
      try {
          $municipalities_details = DB::table('municipalities')
            ->join('barangays', 'barangays.municipalities_id', '=', 'municipalities.id')
            ->join('provinces', 'provinces.id', '=', 'municipalities.provinces_id')
          	->select('municipalities.id', 'barangays.name as barangay',
            'municipalities.name as municipality', 'provinces.name as province', 'municipalities.created_at', 'municipalities.updated_at')
          	->where('municipalities.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $municipalities_details;
    }
}
