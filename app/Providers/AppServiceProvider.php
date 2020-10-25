<?php

namespace App\Providers;

use App\Models\Budget;
use App\Models\Tender;
use App\Models\User;
use App\Observers\BudgetObserver;
use App\Observers\TenderObserve;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
        Budget::observe(BudgetObserver::class);
        Tender::observe(TenderObserve::class);
    }
}
