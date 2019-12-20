<?php

namespace App\Console\Commands;

use App\Token;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateApiToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:token  {name : name the token}
                                        {user : the user id of token owner}
                                        {description? : describe the token}
                                        {l? : the apis limit / min}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a new API Token';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Creating a new API Token');
        $token = (string)Str::uuid();

        Token::create([
            'user_id'       => $this->argument('user'),
            'name'          => $this->argument('name'),
            'description'   => $this->argument('description') ?? '',
            'api_token'     => hash('sha256', $token),
            'limit'         => $this->argument('l') ?? 60,
        ]);

        $this->info('The Token has been created');
        $this->line('Token is: '.$token);
        $this->error('This is the only time you will see this token, so keep it');
    }
}
