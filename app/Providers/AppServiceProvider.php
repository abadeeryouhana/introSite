<?php

namespace App\Providers;

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
        if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
            $settings = \App\Models\Setting::pluck('value', 'key')->all();
            \Illuminate\Support\Facades\View::share('global_settings', $settings);
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('social_links')) {
            $social_links = \App\Models\SocialLink::all();
            \Illuminate\Support\Facades\View::share('social_links', $social_links);
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('chatbot_questions')) {
            $chatbot_questions = \App\Models\ChatbotQuestion::where('is_active', true)->orderBy('order', 'asc')->get();
            \Illuminate\Support\Facades\View::share('chatbot_questions', $chatbot_questions);
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('seo_settings')) {
            \Illuminate\Support\Facades\View::composer('layouts.app', function ($view) {
                $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
                $routeMap = [
                    'home'           => 'home',
                    'about'          => 'about',
                    'sectors.brands' => 'sectors_brands',
                    'services.page'  => 'services',
                    'portfolio'      => 'portfolio',
                    'blog'           => 'blog',
                    'blog.details'   => 'blog',
                    'careers'        => 'careers',
                    'contact'        => 'contact',
                    'terms'          => 'terms',
                    'privacy'        => 'privacy',
                ];

                $pageKey = $routeMap[$routeName] ?? 'home';
                $allSeo = \App\Models\SeoSetting::all()->keyBy('page_key');
                $currentSeo = $allSeo[$pageKey] ?? ($allSeo['global'] ?? null);
                $globalSeo = $allSeo['global'] ?? null;

                $view->with([
                    'current_seo' => $currentSeo,
                    'global_seo'  => $globalSeo,
                ]);
            });
        }
    }
}
