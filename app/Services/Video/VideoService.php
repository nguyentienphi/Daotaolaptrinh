<?php
namespace App\Services\Video;
use App\Services\BaseService;
use App\Models\Video;
class VideoService extends BaseService
{
    public function getModel()
    {
        return Video::class;
    }
    public function getVideoId($id)
    {
        return $this->where('id', $id)->first();
    }
}
