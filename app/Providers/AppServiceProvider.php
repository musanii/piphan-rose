<?php

namespace App\Providers;

use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          TwillNavigation::addLink(
        NavigationLink::make()->forModule('students')->title('Admissions')
        );
        TwillNavigation::addLink(
            NavigationLink::make()
            ->forModule('inventories')
            ->title('Food Inventory')
        );
        TwillNavigation::addLink(
        NavigationLink::make()->forModule('finances')
    );
       

    }
}
