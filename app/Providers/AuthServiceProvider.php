<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\banner;
use App\Models\Borrower;
use App\Models\Order;
use App\Models\Customer;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        view()->composer('*', function($view){
            $ban = Banner::orderBy('id','ASC')->get();
            $bor = Borrower::orderBy('id','ASC')->get();
            $or = Order::orderBy('id','ASC')->get();
            $cus = Customer::orderBy('id','ASC')->get();
            $view->with(compact('ban','bor','or','cus'));
        });
    }
}
