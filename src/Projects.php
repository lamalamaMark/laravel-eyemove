<?php

namespace LamaLama\EyeMove;

use LamaLama\EyeMove\Exceptions\InvalidFeedUrl;
use Illuminate\Support\Facades\Http;

class Projects extends EyeMove
{
    /**
     * List.
     *
     * @return void
     */
    public function list(): array
    {
        $url = config('eyemove.feed_url');

        if (blank($url)) {
            throw new InvalidFeedUrl;
        }

        $response = Http::get($url);
        $contents = $response->getBody()->getContents();

        $xml = simplexml_load_string($contents, "SimpleXMLElement", LIBXML_NOCDATA);
        $array = json_decode(json_encode((array) $xml), true);

        return $array;
    }
}
