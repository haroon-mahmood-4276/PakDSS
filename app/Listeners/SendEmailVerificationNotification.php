<?php

namespace App\Listeners;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification as ListenersSendEmailVerificationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationNotification extends ListenersSendEmailVerificationNotification implements ShouldQueue
{

}
