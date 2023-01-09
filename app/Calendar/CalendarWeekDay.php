<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;



class CalendarWeekDay {
	public $carbon;
	protected $Drank = false;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	function getClassName($test){
		$classNames = ["day-" . strtolower($this->carbon->format("D"))];
		$check = $this->checkDrink($test);

		if($check){ //DrankがTRUEの時はCSS追加
			$classNames[] = " stamp";
		}

		return implode(" ", $classNames);
	}

	/*
	function checkDrink(Calendar){

	}
	*/

	/**
	 * @return 
	 */
	function render()
	{
		$j = $this->carbon->format("j");
	return '<p class="day">' . $j . '</p>';
	}
	
	function getStampDays(){

		$stamps = Calendar::all();//where('user_id', Auth::id());
		$stampdays =[];
		foreach($stamps as $stamp){
			$format = $stamp->created_at->format('d');
			$stampdays[] = (int)$format;
		}
		return $stampdays;
	}

	function checkDrink($test)
	{
		$stampdays = $this->getStampDays(); //ex) 3 5 7 10 
		$j = $this->carbon->format("j"); //ex) 10
		$aaa = [1, 2, 3, 4, 5, 7,15];
		//return true;

		//foreach ($stampdays as $stampday){
			if(in_array($test,$stampdays)){
				return true;
			}else{
			return false;
			}
		
		



		/*
		foreach ($stamps as $stamp) {
		if($stamp->carbon->format("j") == $j){
		return $this->Drank = true;
		}else{
		return $this->Drank = false;
		}
		}
		}
		*/
	}
}