<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'drink_day',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
