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
            $response = $this->guzzleClient->get($this->endPoint);
            $languages = \json_decode($response->getBody(), TRUE);
            return $this->refactorResponse($languages);

        } catch (ClientException $ex) {
            return FALSE;
        }
    }

    /**
     * @param $languages
     * @return bool|mixed
     */
    private function refactorResponse($languages)
    {
        if(!empty($languages)) {
            $response['last_scan'] = $languages['extraData']['createdAt'];
            foreach ($languages['data'] as $key => $value) {
                $response['languages'][] = [
                    'language' => $key == "null" ? "others" : $key, //null mean it not a progamming language
                    'number_repos' => count($languages['data'][$key]),
                    'repos' => $languages['data'][$key],
                ];
            }
            return $response;
        }
        return FALSE;
    }
}
