<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;



class CalendarWeekDay {
	protected $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	function getClassName(){
		return "day-" . strtolower($this->carbon->format("D"));
	}

	/**
	 * @return 
	 */
	function render()
	{
		$j = $this->carbon->format("j");
	return '<p class="day">' . $j . '</p>';
	}
	

	function stamp()
	{
		$j = $this->carbon->format("j");//数字
		return '<p class="day check">' . $j . '</p>';
	}
	function getStampDays(){

		$stampdays = [];

		//開始日〜終了日
		$startDay = 1;
		$lastDay = 31;

		while($startDay <= $lastDay){

			$days = Calendar::where('user_id', Auth::id());//->format('j');
			foreach($days as $day){
				$stamp = $day->drink_day()->carbon->format('j');
				if($startDay == $stamp){
					$stampdays[] = $day;
				}
			}
			$startDay++;
		}
		
		return $stampdays;
	}
}