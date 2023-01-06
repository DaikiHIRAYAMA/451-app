<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;


class CalendarWeek
{

	protected $carbon;
	protected $index = 0;

	function __construct($date, $index = 0)
	{
		$this->carbon = new Carbon($date);
		$this->index = $index;
	}

	function getClassName()
	{
		return "week-" . $this->index;
	}

	/**
	 * @return CalendarWeekDay[]
	 */
	function getDays()
	{

		$days = [];

		//開始日〜終了日
		$startDay = $this->carbon->copy()->startOfWeek();
		$lastDay = $this->carbon->copy()->endOfWeek();

		//作業用
		$tmpDay = $startDay->copy();

		//月曜日〜日曜日までループ
		while ($tmpDay->lte($lastDay)) {

			//前の月、もしくは後ろの月の場合は空白を表示
			if ($tmpDay->month != $this->carbon->month) {
				$day = new CalendarWeekBlankDay($tmpDay->copy());
				$days[] = $day;
				$tmpDay->addDay(1);
				continue;
			}

			//今月
			$day = new CalendarWeekDay($tmpDay->copy());
			$days[] = $day;
			//翌日に移動
			$tmpDay->addDay(1);
		}

		return $days;
	}

	/*
	function getStamps()
	{

		$stamps = [];

		//開始日〜終了日
		$startDay = $this->carbon->copy()->startOfWeek();
		$lastDay = $this->carbon->copy()->endOfWeek();

		//作業用
		$tmpDay = $startDay->copy();

		//購入した日
		$drinks = Calendar::where('user_id', Auth::id());


		//月曜日〜日曜日までループ
		while ($tmpDay->lte($lastDay)) {

			//前の月、もしくは後ろの月の場合は空白を表示
			if ($tmpDay->month != $this->carbon->month) {
				$day = new CalendarWeekBlankDay($tmpDay->copy());
				$stamps[] = $day;
				$tmpDay->addDay(1);
				continue;
			}

			//今月
			//飲んだ日と一致：数
			if (in_array($tmpDay, $drinks)) {
				$day = new CalendarWeekDay($tmpDay->copy());
				$stamps[] = $day;
			} else {
				$stamps[] = "";
			}
			//翌日に移動
			$tmpDay->addDay(1);
		}
		return $stamps;
	}

	*/
	function getStamps()
	{
		$stamps = [];
		//購入した日
		$drinks = Calendar::where('user_id', Auth::id());

		foreach ($drinks as $drink) {
			
			$day = $drink->drink_day->carbon->format("j");

			if ($day == 0) {
				$stamps[] = 0;
			} else {
				$stamps[] = $day;
			}
		}
		return $stamps;
	}
}