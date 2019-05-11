<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Province extends Model
{
	protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'id', 'name',
    ];

    //Function to retrieve a specific user
    public static function getProvinceDetails($id) {
      try {
      	$id=1;
          $province_details = DB::table('provinces')
            ->join('municipalities', 'municipalities.provinces_id', '=', 'provinces.id')
            ->join('barangays', 'municipalities.id', '=', 'barangays.municipalities_id')
          	->select('provinces.id', 'barangays.name as barangay',
            'municipalities.name as municipality', 'provinces.name as province', 'provinces.created_at', 'provinces.updated_at')
          	->where('provinces.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $province_details;
    }
}
