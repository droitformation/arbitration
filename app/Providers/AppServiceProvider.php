<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPageService();
        $this->registerBlocService();
        $this->registerCourseService();
        $this->registerModuleService();
        $this->registerTeamService();
        $this->registerAlumniService();
    }

    protected function registerPageService()
    {
        $this->app->singleton('App\Saa\Page\Repo\PageInterface', function()
        {
            return new \App\Saa\Page\Repo\PageEloquent(new \App\Saa\Page\Entities\Page);
        });
    }

    protected function registerBlocService()
    {
        $this->app->singleton('App\Saa\Bloc\Repo\BlocInterface', function()
        {
            return new \App\Saa\Bloc\Repo\BlocEloquent(new \App\Saa\Bloc\Entities\Bloc);
        });
    }

    protected function registerCourseService()
    {
        $this->app->singleton('App\Saa\Course\Repo\CourseInterface', function()
        {
            return new \App\Saa\Course\Repo\CourseEloquent(new \App\Saa\Course\Entities\Course);
        });
    }

    protected function registerTeamService()
    {
        $this->app->singleton('App\Saa\Team\Repo\TeamInterface', function()
        {
            return new \App\Saa\Team\Repo\TeamEloquent(new \App\Saa\Team\Entities\Team);
        });
    }

    protected function registerAlumniService()
    {
        $this->app->singleton('App\Saa\Alumni\Repo\AlumniInterface', function()
        {
            return new \App\Saa\Alumni\Repo\AlumniEloquent(new \App\Saa\Alumni\Entities\Alumni);
        });
    }

    protected function registerModuleService()
    {
        $this->app->singleton('App\Saa\Module\Repo\ModuleInterface', function()
        {
            return new \App\Saa\Module\Repo\ModuleEloquent(new \App\Saa\Module\Entities\Module);
        });
    }
}
