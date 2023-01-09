<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;
use App\Calendar\CalendarView;
use App\Calendar\CalendarStampDay;
use Carbon\Carbon;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{

    public function form(){

        $setting = Calendar::firstOrNew();
        $calendar = new CalendarView(time());
		$orderCheck = Auth::user()->ordered;

		return view("calendar", [
			"setting" => $setting,
            "calendar" => $calendar,
            "orderCheck" => $orderCheck
		//	"didDrank" => CalendarStampDay::didDrank, //いる？
		//	"notDrink" => CalendarStampDay::notDrink //いる？
		]);
    }
    public function update(Request $request){


        $orderCheck = User::find(Auth::id());
        $today=Carbon::now('Asia/Tokyo');
  


        if ($orderCheck->ordered == 0) {
            //userテーブルのorderを変更
            $orderCheck->ordered = 1;
            $orderCheck->save();

            //calendarテーブルを作成
            $setting = Calendar::Create([
                'flag' =>$request->flag,
                'user_id' => Auth::id(),
            ]);

            $setting->save();

            return redirect()
			->route('form_coffee_break');

        }else{
        return redirect('dashboard')->with('flash_message', '無料ドリンクは1日1杯までです。');   
        }
    }

}
