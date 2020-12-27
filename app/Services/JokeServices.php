<?php

namespace App\Services;

use App\Classes\Data\Jokes;
use Illuminate\Support\Collection;

class JokeServices
{
    const SOURCES = [
        \App\Classes\Sources\Icndb::class,
        \App\Classes\Sources\Sv443::class
    ];

    /**
     * Get Joke
     *
     * @param int $amount
     * @return Collection|null
     */
    public function getJokes(int $amount = 1): ?Jokes
    {
        try {
            // Get random source
            $source = collect(self::SOURCES)->random();
            $source = app($source);

            return $source->getJokes($amount);
        } catch (\Exception $exception) {
            // Do nothing
        }

        return null;
    }
}
