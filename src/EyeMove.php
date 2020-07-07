<?php

namespace LamaLama\EyeMove;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use LamaLama\EyeMove\Leads;
use LamaLama\EyeMove\Projects;
use LamaLama\EyeMove\PropertyInterests;

class EyeMove
{
    /**
     * $apiEndpoint
     * @var string
     */
    private $apiEndpoint = 'https://ws.eye-move.nl';

    public function post($url, $xml)
    {
        $headers = [
            "Content-type: text/xml; charset=utf-8",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Content-length: ".strlen($xml),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $this->apiEndpoint.'/'.$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
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

    /**
     * PropertyInterests.
     *
     * @return void
     */
    public function propertyInterests()
    {
        return new PropertyInterests();
    }
}
