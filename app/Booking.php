<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dentist() 
    {
        return $this->belongsTo(User::class);
    }
}
