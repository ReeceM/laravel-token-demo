<?php

namespace App\Events\Auth;

class TokenEvent
{
    /**
     * The authenticated token.
     *
     * @var \App\Models\Token
     */
    public $token;

    /**
     * The data to persist to mem.
     *
     * @var array
     */
    public $toLog = [];

    /**
     * The IP address of the client
     * @var string $ip
     */
    public $ip;

    /**
     * Create a new event instance.
     *
     * @param  string  $ip
     * @param  \App\Models\Token $token
     * @param  array $toLog
     * @return void
     */
    public function __construct($ip, $token, $toLog)
    {
        $this->ip    = $ip;
        $this->token = $token;
        $this->toLog = $toLog;
    }
}
