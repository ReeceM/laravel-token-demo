<?php

namespace App\Extensions;

use App\Events\Auth\TokenFailed;
use App\Events\Auth\TokenAuthenticated;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class TokenUserProvider extends EloquentUserProvider
{
    use LogsToken;

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (
            empty($credentials) || (count($credentials) === 1 &&
                array_key_exists('password', $credentials))
        ) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'password')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }
        $token = $query->with('user')->first();

        if (!is_null($token)) {
            $this->logToken($token, request());
        } else {
            $this->logFailedToken($token, request());
        }

        return $token->user ?? null;
    }

    /**
     * Gets the structure for the log of the token
     *
     * @param \App\Models\Token $token
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function logToken($token, $request): void
    {
        event(new TokenAuthenticated($request->ip(), $token, [
            'parameters' => $this->cleanData($request->toArray()),
            'headers' => [
                'user-agent' => $request->userAgent(),
            ],
        ]));
    }

    /**
     * Logs the data for a failed query.
     *
     * @param \App\Models\Token|null $token
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function logFailedToken($token, $request): void
    {
        event(new TokenFailed($request->ip(), $token, [
            'parameters' => $this->cleanData($request->toArray()),
            'headers' => collect($request->headers)->toArray(),
        ]));
    }

    /**
     * Filter out the data to get only the desired values.
     *
     * @param array $parameters
     * @param array $skip
     * @return array
     */
    protected function cleanData($parameters, $skip = ['api_token']): array
    {
        return array_filter($parameters, function ($key) use ($skip) {
            if (array_search($key, $skip) !== false) {
                return false;
            }
            return true;
        }, ARRAY_FILTER_USE_KEY);
    }
}
