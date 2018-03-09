<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MForm extends Model
{
    protected $table		= 'booking_fight';
	protected $fillable		= ['id','name','email','form','to','adults','children','travel_class','date_on','journey_type'];
}
