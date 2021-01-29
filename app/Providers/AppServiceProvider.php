<?php

namespace App\Providers;

use App\Services\Employee\ArrayEmployeeList;
use App\Services\Employee\Employee;
use App\Services\Employee\EmployeeInterface;
use App\Services\Employee\EmployeeListInterface;
use App\Services\Permissions\ArrayPermissionList;
use App\Services\Permissions\Permission;
use App\Services\Permissions\PermissionInterface;
use App\Services\Permissions\PermissionListInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EmployeeInterface::class,
            Employee::class
        );
        $this->app->bind(
            EmployeeListInterface::class,
            ArrayEmployeeList::class
        );
        $this->app->bind(
            PermissionListInterface::class,
            ArrayPermissionList::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
