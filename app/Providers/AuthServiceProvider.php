<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        VerifyEmail::toMailUsing(function($notifiable,$url){
            return(new MailMessage)
            ->subject('Confirmación de cuenta Borrowing.com')
            ->greeting('Bienvenido a Borrowing.com !!')
            ->line('Por favor da click en el siguiente botón para dar de alta tu cuenta y poder formar parte de está red social.')
            ->action('Activar cuenta',$url)
            ->line('Si no creaste ninguna cuenta, por favor ignora este Email')
            ->salutation('Saludos por parte de Borrowing.com');
        });
    }
}
