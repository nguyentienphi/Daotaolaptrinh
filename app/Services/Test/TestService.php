<?php

namespace App\Services\Test;

use App\Services\BaseService;
use App\Models\Test;
use DB;

class TestService extends BaseService
{
    public function getModel()
    {
        return Test::class;
    }

    //get list test of course
    public function listTest($id)
    {
        $tests = Test::where('course_id', $id)->paginate(config('settings.paginate.list_test'));

        return $tests;
    }

    public function create($data)
    {
        $test = Test::create([
            'course_id' => $data['course'],
            'name' => $data['name'],
            'time' => $data['time']
        ]);

        return $test;
    }
}
