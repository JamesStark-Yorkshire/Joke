<?php

namespace App\Classes\Data;

use Illuminate\Support\Collection;

class Jokes
{
    private Collection $jokes;

    public static function make(Collection $jokes): self
    {
        $instance = new self;

        $instance->jokes = $jokes;

        return $instance;
    }

    public function toArray(): array
    {
        return $this->jokes->toArray();
    }
}
