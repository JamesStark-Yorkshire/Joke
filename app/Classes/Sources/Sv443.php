<?php

namespace App\Classes\Sources;

use App\Classes\Data\Jokes;
use App\Contracts\SourceContract;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Sv443 implements SourceContract
{
    const URL = "https://v2.jokeapi.dev/joke";

    public function getJokes(int $amount = 1): Jokes
    {
        $response = Http::get(
            self::URL . '/Any',
            [
                'type' => 'single',
                'amount' => $amount
            ]
        );

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
        // Multiple Jokes
        if ($jokes = $response->json('jokes')) {
            $jokes = collect($response->json('jokes'))->pluck('joke', 'id');
        }

        // Single Jokes
        if (!$jokes) {
            $jokes = collect([$response->json()])->pluck('joke', 'id');
        }

        $jokes = Jokes::make($jokes);

        return $jokes;
    }
}
