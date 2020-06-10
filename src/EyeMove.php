<?php

namespace LamaLama\EyeMove;

use LamaLama\EyeMove\Leads;
use LamaLama\EyeMove\Projects;
use Zttp\Zttp;

class EyeMove
{
    private $apiUrl = 'http://ws.eye-move.nl';

    /**
     * get.
     *
     * @return void
     */
    public function get($endpoint, $params)
    {
        $response = Zttp::get($this->url($endpoint), $params);

        return $response->json();
    }

    /**
     * post.
     *
     * @return void
     */
    public function post($endpoint, $params)
    {
        $response = Zttp::post($this->url($endpoint), $params);

        return $response->json();
    }

    /**
     * url
     * @param  string $path
     * @return string
     */
    private function url($path)
    {
        return $this->apiUrl.'/'.$path;
    }

    /**
     * Leads.
     *
     * @return void
     */
    public function leads()
    {
        return new Leads();
    }

    /**
     * Projects.
     *
     * @return void
     */
    public function projects()
    {
        return new Projects();
    }
}
