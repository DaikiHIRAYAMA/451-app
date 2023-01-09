<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Calendar extends Model
{
    use HasFactory;

    protected $table = "calendars";
	const didDrank = 0;
	const notDrink = 1;


    protected $fillable = [
        'user_id',
        'flag'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	/**
	 * @return mixed
	 */
	public function getTable() {
		return $this->table;
	}
	
	/**
	 * @param mixed $table 
	 * @return self
	 */
	public function setTable($table): self {
		$this->table = $table;
		return $this;
	}
}
