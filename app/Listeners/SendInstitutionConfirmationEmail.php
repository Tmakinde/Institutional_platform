<?php

namespace App\Listeners;

use App\Events\InstitutionRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class SendInstitutionConfirmationEmail
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
     * @param  InstitutionRegistered  $event
     * @return void
     */
    public function handle(InstitutionRegistered $event)
    {
        /**send mail
         * Blade file => mail/activation.blade.php
        **/
        $institution = $event->institution;
        Mail::send(
            'Admin.activation',
            $institution,
            function ($m) use ($institution) {
            $m->to($institution['email'])->subject('A confirmation message');
            }
        );
    }
}
