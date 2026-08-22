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
    }
}
