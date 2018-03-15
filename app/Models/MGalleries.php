<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MGalleries extends Model
{
    protected $table		= 'gallery_travell';
	protected $fillable		= ['id', ' 	gallery_name', 'gallery_description', 'gallery_text', 'gallery_status', 'created_at', 'updated_at','image_gallery'];
}
