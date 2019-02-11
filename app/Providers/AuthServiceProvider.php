<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Models\hh\User::class => \App\Policies\hh\UserPolicy::class,
        \App\Models\hh\Post::class => \App\Policies\hh\PostPolicy::class,
        \App\Models\hh\PostImage::class => \App\Policies\hh\PostImagePolicy::class,
        \App\Models\hh\PostMeta::class => \App\Policies\hh\PostMetaPolicy::class,
        \App\Models\hh\PostTag::class => \App\Policies\hh\PostTagPolicy::class,
        \App\Models\hh\Comment::class => \App\Policies\hh\CommentPolicy::class,
        \App\Models\hh\Tag::class => \App\Policies\hh\TagPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
