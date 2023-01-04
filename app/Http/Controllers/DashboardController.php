<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Calendar;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){
        $today=Carbon::now('Asia/Tokyo'); //日付が変わったら表示されなくなる
        $calendars = Calendar::whereDate('updated_at',$today)->get();//時間で区切る
        $users = User::whereDate('updated_at',$today)->get();
        return view('dashboard',compact('calendars','users'));
    }
}
