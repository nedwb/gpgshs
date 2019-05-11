<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonalityAnswer extends Model
{
	protected $table = 'personality_answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
        'id', 'a', 'b', 'personality_questions_id',
    ];
}
