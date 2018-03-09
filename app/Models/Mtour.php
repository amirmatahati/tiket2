<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mtour extends Model
{
    protected $table		= 'tour_post';
	protected $fillable		= ['id','travel_title','travel_text','travel_image','user_id','created_at','updated_at'];
}
