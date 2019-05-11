<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barangay extends Model
{
	protected $table = 'barangays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'id', 'name', 'municipalities_id',
    ];

    //Function to retrieve a barangay details.
    public static function getBarangayDetails($id) {
      try {
          $barangay_details = DB::table('barangays')
            ->join('municipalities', 'municipalities.id', '=', 'barangays.municipalities_id')
            ->join('provinces', 'provinces.id', '=', 'municipalities.provinces_id')
          	->select('barangays.id', 'barangays.name as barangay',
            'municipalities.name as municipality', 'provinces.name as province', 'barangays.created_at', 'barangays.updated_at')
          	->where('barangays.id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $barangay_details;
    }
}
