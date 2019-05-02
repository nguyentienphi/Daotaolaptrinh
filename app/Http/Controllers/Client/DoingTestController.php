<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Test\TestService;
use App\Services\Result\ResultService;
use App\Services\Answer\AnswerService;
use App\Services\Point\PointService;
use App\Http\Requests\DoingTestRequest;
use Exception;
use Auth;
use DB;

class DoingTestController extends Controller
{
    protected $testService;
    protected $resultService;
    protected $answerService;
    protected $pointService;

    public function __construct(
        TestService $testService,
        ResultService $resultService,
        AnswerService $answerService,
        PointService $pointService
    )
    {
        $this->testService = $testService;
        $this->resultService = $resultService;
        $this->answerService = $answerService;
        $this->pointService = $pointService;
    }

    public function listTest($id)
    {
        $tests = $this->testService->listTest($id);

        return view('clients.tests.doings.index', compact('tests'));
    }

    public function show($id)
    {
        $test = $this->testService->findOrFail($id);
        $questions = $test->questions;

        return view('clients.tests.doings.show', compact('test', 'questions'));
    }

    public function complete(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        DB::beginTransaction();

        try {
            $questions = $request->question;
            $answers = $request->answer;
            $point = 0;
            $user = Auth::user()->id;

            if ($answers != null) {
                foreach ($questions as $keyQuestion => $question) {
                    $point = 0;
                    foreach ($answers as $keyAnswer => $answer) {
                        $checkCorrect = $this->answerService->getOnly($answer);

                        if ($checkCorrect) {
                            $point = $point + 1;
                        }

                        if ($keyQuestion == $keyAnswer) {
                            $input = [
                                'user_id' => $user,
                                'question_id' => $question,
                                'answer_id' => $answer
                            ];

                            $result = $this->resultService->createRsult($input, $question);

                            if (!$result) {
                                throw new Exception(trans('lang.create_fail'), 1);
                            }
                        }
                    }
                }
            } else {
                foreach ($questions as $question) {
                    $point = 0;
                        $input = [
                            'user_id' => $user,
                            'question_id' => $question,
                            'answer_id' => config('settings.answer.incorrect')
                        ];

                    $result = $this->resultService->createRsult($input, $question);

                    if (!$result) {
                        throw new Exception(trans('lang.create_fail'), 1);
                    }
                }
            }

            $points = [
                'user_id' => Auth::user()->id,
                'test_id' => $request->testId,
                'point' => $point
            ];

            $resultPoint = $this->pointService->createPoint($points);

            if (!$resultPoint) {
                throw new Exception(trans('lang.create_fail'), 1);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'redirect' => route('test.doing.details', $request->testId),
                'data' => $request->all()
            ]);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                    'success' => false,
                    'message' => trans('lang.fail')
                ]);
        }

    }

    public function detail($id)
    {
        $point = $this->pointService->getPoint($id);

        if ($point == null) {
            return view('errors.404');
        }

        $test = $point->test;
        $ranks = $this->pointService->getRanking($id);
        $results = Auth::user()->results;

        return view('clients.tests.doings.detail', compact('point', 'test', 'ranks', 'results'));
    }
}
