<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpesawat extends Model
{
    protected $table		= 'pesawat';
	protected $fillable		= ['id','name','seat_number','status','created_at','updated_at','image'];
}
