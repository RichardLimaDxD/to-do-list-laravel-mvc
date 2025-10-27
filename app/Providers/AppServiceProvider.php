<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Model::unguard(true);

        Password::defaults(function () {
            $rule = Password::min(4);

            return $this->app->isProduction() ? $rule
                ->min(8)
                ->max(120)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised() : $rule;
        });
    }
}
