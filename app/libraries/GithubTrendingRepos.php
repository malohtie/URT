<?php


namespace App\libraries;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GithubTrendingRepos
{
    /**
     * @var string
     */
    private $endPoint="https://maxday.github.io/trending/data.json";

    /**
     * @var Client
     */
    private $guzzleClient;


    public function __construct()
    {
        //init guzzle client
        $this->guzzleClient = new Client();
    }

    /**
     * Get data and refactor it
     * @return bool|mixed
     */
    public function getTrendingLanguages()
    {
        try {
            $response = $this->guzzleClient->get($this->end_point);
            $languages = \json_decode($response->getBody(), TRUE);
            return $languages;

        } catch (ClientException $ex) {
            return FALSE;
        }
    }
}
