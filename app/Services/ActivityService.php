<?php

namespace App\Services;

class ActivityService
{
    public function addMinutes($date, $duration)
    {
        return date("Y-m-d H:i:s", strtotime("+$duration minutes", strtotime($date)));
    }

    public function convertToMinutes($duration)
    {
        $arr = explode(":", $duration);
        return intval($arr[0]) * 60 + intval($arr[1]);
    }
}
