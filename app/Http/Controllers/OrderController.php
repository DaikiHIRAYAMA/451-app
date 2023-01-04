<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;
use DateTime;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function update(){


        $orderCheck = User::find(Auth::id());
        $date = new Datetime;

        if ($orderCheck->ordered == 0) {
            $orderCheck->ordered = 1;
            $orderCheck->save();

            //calendarのdrink_dayに登録
            $createCalendar = Calendar::create([
                'drink_day' => $date->format('Y-m-d'),
                'user_id'   => Auth::id(),
            ]);

            return view('dashboard',[ "orderCheck" => $orderCheck, "createCalendar" => $createCalendar]);

        }else{
        return redirect('dashboard')->with('flash_message', '無料ドリンクは1日1杯までです。');   
        }
    }

}
