<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LearnerDocument extends Model
{
	protected $table = 'learner_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'id', 'filename', 'extension', 'filesize', 'location', 'document_types_id',
    ];

    //Function to retrieve a specific user
    public static function getDetailsByLearnersId($id) {
      try {
          $details = DB::table('learner_documents')
          	->select('id', 'filename', 'extension', 'filesize', 'location', 'learners_id')
          	->where('learners_id', '=', $id)
          	->distinct();
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $details;
    }
}