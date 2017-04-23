<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
	protected $policies = [
		'App\Models\Post' => 'App\Policies\PostPolicy',
		'App\Models\User' => 'App\Policies\UserPolicy',
		'App\Models\PostImage' => 'App\Policies\PostImagePolicy',
		'App\Models\PostMeta' => 'App\Policies\PostMetaPolicy',
		'App\Models\PostTag' => 'App\Policies\PostTagPolicy',
		'App\Models\Comment' => 'App\Policies\CommentPolicy',
		'App\Models\Tag' => 'App\Policies\TagPolicy',
	];


	public function boot(GateContract $gate)
	{
		$this->registerPolicies($gate);
	}
}
