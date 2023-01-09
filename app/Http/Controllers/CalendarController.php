<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use Illuminate\Support\Facades\Auth;
use App\Calendar\CalendarStampDay;

class CalendarController extends Controller
{
    public function show(){
		
		$calendar = new CalendarView(time());
		$orderCheck = Auth::user()->ordered;

		return view('calendar', [
			"calendar" => $calendar, 
			"orderCheck" => $orderCheck
		]);
	}


}
