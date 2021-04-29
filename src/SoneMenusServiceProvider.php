<?php

namespace Sequelone\Sone\Menus;

use Closure;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Sequelone\Sone\Menus\Models\Menu;
use Sequelone\Sone\Menus\Http\ViewComposers\Navigation\MenuComposer;
use Sequelone\Sone\Menus\Http\ViewComposers\Navigation\SubmenuComposer;

class SoneMenusServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'sonemenus');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sonemenus');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/sone'),
        ], 'SoneMenus-views');

        $this->publishes([
            __DIR__ . '/../resources/views/widgets' => base_path('resources/views/vendor/sone/widgets'),
        ], 'SoneMenus-widgets');

        $this->publishes([
            __DIR__ . '/../resources/lang' => base_path('resources/lang/vendor/sone'),
        ], 'SoneMenus-lang');

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/sone'),
        ], 'SoneMenus-public');

        $this->publishes([
            __DIR__.'/../database/migrations' => base_path('database/migrations'),
        ], 'SoneMenus-migrations');

        $this->publishes([
            __DIR__.'/../database/seeders' => base_path('database/seeders'),
        ], 'SoneMenus-seeders');

        $this->soneMenuLoad();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Menu load service provider
     *
     * @return void
     */
    public function soneMenuLoad() {
        view()->composer('sonemenus::menu', MenuComposer::class);
        view()->composer('sonemenus::submenu', SubmenuComposer::class);
        /*View::composer(['sonemenus::submenu'], function($view) {
            $view->with(['submenus' => Menu::with('parent')->get()]);
            $view->with(['levelMax' => Menu::where('level', '!=', 0)->max('level')]);
            $view->with(['levelMin' => Menu::where('level', '!=', 0)->min('level')]);
        });*/
    }

}
