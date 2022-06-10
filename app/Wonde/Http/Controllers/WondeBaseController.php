<?php

namespace App\Wonde\Http\Controllers;

use App\Http\Controllers\Controller;

class WondeBaseController extends Controller
{
    /**
     * @var \Wonde\Client
     */
    protected $client;

    /**
     * @throws \Wonde\Exceptions\InvalidTokenException
     */
    public function __construct()
    {
        $this->client = new \Wonde\Client(env('WONDE_API_TOKEN'));
    }
}
