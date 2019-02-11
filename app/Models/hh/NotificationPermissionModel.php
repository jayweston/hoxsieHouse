<?php

namespace App\Models\hh;

use Illuminate\Database\Eloquent\Model;

class NotificationPermissions extends Model
{
	protected $fillable = ['user_id', 'email', 'google', 'twitter', 'facebook', 'instagram', 'pinterest'];
}
