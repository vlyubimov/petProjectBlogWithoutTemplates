<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Tests\Database\Time;

// controller for counting the time of posts

class TimeDifferenceController extends Controller
{
    static public function calculateDifference ($timePast) {
        $time1 = Carbon::now();
        $e = date_diff($time1, $timePast);
        if ($e->y > 0){
            return $timePast->format('j M Y в G:i');
        }
        elseif ($e->d > 0){
            return $timePast->format('j M в G:i');
        }
        elseif ($e->h > 0){
            if (($e->h < 10 or $e->h > 20) and $e->h % 10 == 1) {
                return "$e->h час назад";
            }
            elseif (($e->h < 10 or $e->i > 20) and in_array($e->h % 10, [2,3,4])) {
                return "$e->h часa назад";
            }
            else {
                return "$e->h часов назад";
            }


        }
        elseif ($e->i > 0){
            if (($e->i < 10 or $e->i > 20) and $e->i % 10 == 1) {
                return "$e->i минуту назад";
            }
            elseif (($e->i < 10 or $e->i > 20) and in_array($e->i % 10, [2,3,4])) {
                return "$e->i минуты назад";
            }
            else {
                return "$e->i минут назад";
            }

        }
        else {

            if (($e->s < 10 or $e->s > 20) and ($e->s % 10 == 1)) {
                return "$e->s секунду назад";
            }
            elseif (($e->s < 10 or $e->s > 20) and in_array($e->s % 10, [2,3,4])) {
                return "$e->s секунды назад";
            }
            else {
                return "$e->s секунд назад";
            }
        }
    }
}
