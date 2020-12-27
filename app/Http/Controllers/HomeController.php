<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JokeServices;

class HomeController extends Controller
{
    /**
     * Index page
     *
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Fetch specify amount of joke
     *
     * @param Request $request
     * @param JokeServices $jokeServices
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function list(Request $request, JokeServices $jokeServices)
    {
        $jokes = $jokeServices->getJokes($request->input('amount', 1));

        return view('list', ['jokes' => $jokes->toArray()]);
    }
}
