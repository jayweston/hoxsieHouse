<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationPermission extends Model
{
	protected $fillable = ['user_id', 'email', 'google', 'twitter', 'facebook', 'instagram', 'pinterest'];
}