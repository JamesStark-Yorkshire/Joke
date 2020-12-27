<?php

namespace App\Classes\Sources;

use App\Classes\Data\Jokes;
use App\Contracts\SourceContract;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Icndb implements SourceContract
{
    const URL = "http://api.icndb.com/jokes";

    /**
     * @param int $amount
     * @return Jokes
     */
    public function getJokes(int $amount = 1): Jokes
    {
        $response = Http::get(self::URL . '/random/' . $amount);

        return $this->castToJokes($response);
    }

    /**
     * Cast response to Joke
     *
     * @param Response $response
     * @return Jokes
     */
    private function castToJokes(Response $response): Jokes
    {
        $jokes = collect($response->json('value'))
            ->pluck('joke', 'id');

        $jokes = Jokes::make($jokes);

        return $jokes;
    }
}
