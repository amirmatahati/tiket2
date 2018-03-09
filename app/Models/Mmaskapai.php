<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mmaskapai extends Model
{
    protected $table		= 'maskapai';
	protected $fillable		= ['id','time_go','transit','durasi','id_pesawat','price','id_fasilita','go_away','tujuan','status','date_go','seat_stock'];
	
	public function Pesawat()
	{
		return $this->belongsTo('App\Models\Mpesawat','id_pesawat','id');
	}
	public function Provincies()
	{
		return $this->belongsTo('App\Models\Mprovinces','go_away','id');
	}
	public function Provincies2()
	{
		return $this->belongsTo('App\Models\Mprovinces','tujuan','id');
	}
}
