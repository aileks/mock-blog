<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21',
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    public function boot(): void
    {
        Model::unguard();

        Gate::define('admin', fn(User $user) => $user->username === 'liyah');

        Blade::if('admin', fn() => request()->user()?->can('admin'));
    }
}
