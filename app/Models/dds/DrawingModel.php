<?php

namespace App\Models\dds;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
	protected $fillable = ['id','value','width','height','color','category','title','summary','ebay','amazon','jpg'];
	public $timestamps = false;
	protected $connection = 'dds';
}


