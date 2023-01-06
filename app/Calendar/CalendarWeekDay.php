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
	
	function stamp_render(){
		return '<p class="day">' . $this->carbon->format("j") . '</p>';
	}
}