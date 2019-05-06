<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Test\TestService;
use App\Services\Course\CourseService;
use App\Services\Question\QuestionService;
use App\Services\Answer\AnswerService;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    protected $testService;
    protected $courseService;
    protected $questionService;
    protected $answerService;

    public function __construct(
        TestService $testService,
        CourseService $courseService,
        QuestionService $questionService,
        AnswerService $answerService
    )
    {
        $this->testService = $testService;
        $this->courseService = $courseService;
        $this->questionService = $questionService;
        $this->answerService = $answerService;
    }

    //get list test of course
    public function listTest($id)
    {
        $tests = $this->testService->listTest($id);
        $course = $this->courseService->findOrFail($id);

        return view('clients.tests.index', compact('tests', 'course'));
    }

    public function create($id)
    {
        return view('clients.tests.create', compact('id'));
    }

    public function store(TestRequest $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        try {
            $data = $request->all();
            $questions = $data['question'];
            $answers = $data['answer'];
            $corrects = $data['check_correct_question'];
            $test = $this->testService->create($data);

            foreach ($questions as $keyQuestions => $question) {

                $questionId = $this->questionService->createQuestion($question, $test->id);

                foreach ($answers as $keyAnwser => $answer) {
                    if ($keyQuestions == $keyAnwser) {
                        foreach ($answer as $value) {
                            $this->answerService->createAnswer($questionId->id, $value, $corrects, $keyAnwser);
                        }

                    }
                }
            }

            $request->session()->flash('success', trans('test.success'));

            return response()->json([
                'success' => true,
                'redirect' => route('list-test', $data['course'])
            ]);
        } catch (Exception $e) {
            $request->session()->flash('success', trans('test.falis'));
        }
    }

    public function show($id)
    {
        $test = $this->testService->findOrFail($id);
        $questions = $test->questions;

        return view('clients.tests.show', compact('test', 'questions'));
    }
}
