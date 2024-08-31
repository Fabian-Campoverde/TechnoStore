<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\HtmlString;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = Auth::user();
              
            
            if ($user) {
                $userImageUrl = $user->image_url ;
                $userRoles='';
                foreach ($user->roles as $rol) {
                    $userRoles=$userRoles.' | '. $rol->name ;
                };
                $userImageHtml = '<div class="mr-2"> 
                <img src="' . asset($userImageUrl) . '" class="brand-image img-circle elevation-3" alt="User Image">
                </div>
                <div class="pl-3">
                <div class="text-base font-semibold">' . $user->nickname. '</div>
                <div class="font-normal text-gray-500">' .$userRoles. '</div>
                </div>  ';
                
        
                $userImageLink = new HtmlString($userImageHtml );
        
                $event->menu->addBefore('pages', [
                    'text' => $userImageLink,
                    'url'  => '#',
                    'topnav' => true, 
                    
                   
                    'classes' => 'user-panel flex items-center ',
                    'icon' => '', 
                ]);
            }
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
