<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LearnerValidation extends Model
{
	protected $table = 'learner_validations';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'id', 'status', 'validated_by', 'comments',
	];
}
