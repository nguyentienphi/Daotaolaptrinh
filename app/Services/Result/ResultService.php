<?php

namespace App\Services\Result;

use App\Services\BaseService;
use App\Models\Result;
use App\Models\Question;
use Auth;
use DB;

class ResultService extends BaseService
{
    public function getModel()
    {
        return Result::class;
    }

    public function createRsult($input, $question)
    {
        $question = Question::findOrFail($question);

        if ($question->result) {
            foreach ($question->result as $result) {
                if ($result->user_id == Auth::user()->id) {
                    $result->delete();
                }
            }
        }

        return Result::create($input);
    }
}
