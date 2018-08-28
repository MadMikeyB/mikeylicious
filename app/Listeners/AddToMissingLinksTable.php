<?php

namespace App\Listeners;

use App\Models\MissingLink;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use \Spatie\MissingPageRedirector\Events\RedirectNotFound;

class AddToMissingLinksTable
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RedirectNotFound  $event
     * @return void
     */
    public function handle(RedirectNotFound $event)
    {
        $missingLink = MissingLink::updateOrCreate(
            [
                'url' => $event->request->url()
            ],
            [
                'url' => $event->request->url(),
            ]
        );

        $missingLink->increment('hits');
    }
}
