<?php

namespace App\Events\Auth;

use Illuminate\Queue\SerializesModels;

class TokenFailed extends TokenEvent
{
    use SerializesModels;

}
