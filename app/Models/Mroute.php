<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mroute extends Model
{
    protected $table 		= 'rute';
	protected $fillable		= ['id','city','kelas','price','date_go','created_at','updated_at'];
}
