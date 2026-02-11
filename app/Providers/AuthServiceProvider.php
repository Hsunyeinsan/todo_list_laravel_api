<?php

namespace App\Providers;

use App\Models\TodoList;
use App\Policies\TodoListPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $policies=[
        TodoList::class=>TodoListPolicy::class
    ];

    /**
     * Bootstrap services.
     */
    public $user;
    public function boot(): void
    {
        Gate::define('view_todolist',function ($user,TodoList $todoList){
            return $user->id===$todoList->user_id;
        });
    }
}
