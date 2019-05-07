<?php
namespace App\Services\Point;
use App\Services\BaseService;
use App\Models\Point;
use Auth;

class PointService extends BaseService
{
    public function getModel()
    {
        return Point::class;
    }

    public function createPoint($input)
    {
        $point = Point::where('test_id', $input['test_id'])
            ->where('user_id', Auth::user()->id)->first();

        if ($point) {
            $point->delete();
        }

        return Point::create($input);
    }

    public function getPoint($id)
    {
        $point = Point::where('test_id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

        return $point;
    }

    public function getRanKing($id)
    {
        $rank = Point::where('test_id', $id)
                ->orderBy('point', 'desc')
                ->take(10)
                ->get();

        return $rank;
    }
}
