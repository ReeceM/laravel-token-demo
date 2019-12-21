<?php

namespace App\Events\Auth;

use Illuminate\Queue\SerializesModels;

class TokenAuthenticated extends TokenEvent
{
    use SerializesModels;
}
