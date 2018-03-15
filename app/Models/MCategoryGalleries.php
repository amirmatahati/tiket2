<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCategoryGalleries extends Model
{
    protected $table	='category_galleries';
	protected $fillabel	= ['id', 'category_name', 'category_status', 'created_at', 'updated_at'];
}
