<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Booking;
use App\Models\Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\Item;
use App\Policies\ActivityPolicy;
use App\Policies\BookingPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\FacilityPolicy;
use App\Policies\ItemPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Employee::class => EmployeePolicy::class,
        Category::class => CategoryPolicy::class,
        Item::class => ItemPolicy::class,
        Facility::class => FacilityPolicy::class,
        Activity::class => ActivityPolicy::class,
        Booking::class => BookingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
