<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @param DispatcherContract $events
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /*    public function boot(DispatcherContract $events)
        {
            parent::boot($events);

            $events->listen('revisionable.*', function($eventName, $data) {
                // $eventName = revisionable.created, revisionable.saved or revisionable.deleted
                // $data['model']
                // $data['revisions']
            });
        }*/

    /*public function boot()
    {
        parent::boot();

        Event::listen('revisionable.*', function ($model, $revisions) {
            // Do something with the revisions or the changed model.
            dd($model, $revisions);
        });
    }
    */
}
