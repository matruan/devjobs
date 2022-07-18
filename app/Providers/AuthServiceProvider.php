<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
              ->subject('Verificar cuenta')
              ->line('Tu cuenta casi está lista, solo debes presionar el enlace a continuación')
              ->action('Confirmar cuenta', $url)
              ->line('Si no creaste esta cuenta puedes ignorar este mensaje');
        });
        //
    }
}
