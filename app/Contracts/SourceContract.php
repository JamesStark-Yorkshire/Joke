<?php

namespace App\Contracts;

use App\Classes\Data\Jokes;

interface SourceContract
{
    public function getJokes(int $amount): Jokes;
}
