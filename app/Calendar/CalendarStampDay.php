<?php
namespace App\Calendar;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Calendar;


class CalendarStampDay extends Model
{

	protected $fillable = [
        'user_id',
        'flag'
    ];

}