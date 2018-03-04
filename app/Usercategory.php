<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Usercategory extends Model
{
	protected $table = 'user_category';
    public $fillable = ['id','name'];
	
	public function CategoryUser()
	{
		return $this->belongsTo('App\User','category_user','id');
	}
}
