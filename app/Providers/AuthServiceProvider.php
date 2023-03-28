<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',  
        'App\Models\City' => 'App\Policies\CityPolicy',
        'App\Models\Locality' => 'App\Policies\LocalityPolicy',
        'App\Models\Institutes' => 'App\Policies\InstitutePolicy',
        'App\Models\Faculties' => 'App\Policies\FacultyPolicy',
        /* 'App\Models\Leads' => 'App\Policies\LeadsPolicy',
        'App\Models\Bookings' => 'App\Policies\BookingsPolicy', */
        'App\Models\User' => 'App\Policies\UserPolicy',      
        'App\Models\Examinations' => 'App\Policies\ExaminationsPolicy',
        'App\Models\Courses' => 'App\Policies\CoursePolicy',
        'App\Models\Contact' => 'App\Policies\ContactsPolicy',
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
