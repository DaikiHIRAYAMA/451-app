<?php
namespace App\Calendar;
use Carbon\Carbon;

/**
* 余白を出力するためのクラス
*/
class CalendarWeekBlankDay extends CalendarWeekDay {
	public $carbon;
	
	function __construct($date){
		$this->carbon = new Carbon($date);
	}
    function getClassName($test){
		return "day-blank";
	}

	/**
	 * @return 
	 */
	function render(){
		return '';
	}

}