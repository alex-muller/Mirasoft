<?php

namespace App\Services;

use GuzzleHttp\Client;

class YesNoService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAnswer()
    {
        $response = $this->client->request('GET', 'https://yesno.wtf/api');

        return json_decode($response->getBody()->getContents());
    }
}