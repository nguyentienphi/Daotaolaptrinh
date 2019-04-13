<?php
namespace App\Services\Question;
use App\Services\BaseService;
use App\Models\Question;
use Auth;
use Session;

class QuestionService extends BaseService
{
    public function getModel()
    {
        return Question::class;
    }

    public function createQuestion($value, $id)
    {
        $question = Question::create([
            'test_id' => $id,
            'content' => $value
        ]);

        return $question;
    }
}
