<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonalityTest extends Model
{
	protected $table = 'personality_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
        'id', 'question', 'mbti',
    ];

/*
    //Function to retrieve random questions
    public static function getRandomQuestionAnswers($mbti) {
      try {
        $randomQ = DB::select(
          DB::raw("
            SELECT t1.* FROM
            (SELECT c.id, c.question, d.a, d.b FROM personality_questions c, personality_answers d
              where c.id = d.personality_questions_id
              and c.mbti='$mbti') as t1
            INNER JOIN
            (SELECT a.id FROM personality_questions a, personality_answers b
              where a.id = b.personality_questions_id
              and a.mbti='$mbti'
              ORDER BY RAND()
              LIMIT 11) as t2
            ON t1.id = t2.id;"
          )
        );
      }
      catch(PDOException $exception) {
          die(var_dump($exception->getMessage()));
      }
      return $randomQ;
    }
*/
  //Function to retrieve random questions
  public static function getRandomTest($mbti) {
    try {
      $randomQ = DB::table('personality_questions')
        ->join('personality_answers', 'personality_answers.personality_questions_id', '=', 'personality_questions.id')
        ->select('personality_questions.id', 'personality_questions.question',
        'personality_answers.a', 'personality_answers.b', 'personality_questions.mbti')
        ->where('personality_questions.mbti', '=', $mbti)
        ->orderByRaw("RAND()")
        ->limit(11)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $randomQ;
  }

  //Function to all test questions per mbti type.
  public static function getAllQuestionsByType($mbti) {
    try {
      $randomQ = DB::table('personality_questions')
        ->join('personality_answers', 'personality_answers.personality_questions_id', '=', 'personality_questions.id')
        ->select('personality_questions.id', 'personality_questions.question',
        'personality_answers.a as answer_a', 'personality_answers.b as answer_b', 'personality_questions.mbti')
        ->where('personality_questions.mbti', '=', $mbti)
        ->distinct();
    }
    catch(PDOException $exception) {
        die(var_dump($exception->getMessage()));
    }
    return $randomQ;
  }
}
