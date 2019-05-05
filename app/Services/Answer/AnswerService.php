<?php

namespace App\Services\Answer;

use App\Services\BaseService;
use App\Models\Answer;
use DB;

class AnswerService extends BaseService
{
    public function getModel()
    {
        return Answer::class;
    }

    public function createAnswer($id, $value, $corrects, $keyAnwser)
    {
        $isRight = config('settings.answer.incorrect');

        foreach ($corrects as $keyCorrect=>$correct) {
            if ($correct == $value && $keyCorrect == $keyAnwser) {
                $isRight = config('settings.answer.correct');
            }
        }

        Answer::create([
            'question_id' => $id,
            'content' => $value,
            'is_right' => $isRight
        ]);
    }

    public function getOnly($id)
    {
        $answer = Answer::where('id', $id)
            ->where('is_right', config('settings.answer.correct'))
            ->first();

        return $answer;
    }
}
