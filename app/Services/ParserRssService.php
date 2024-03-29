<?php

namespace App\Services;

use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class ParserRssService
{
public static function parseRss()
{
    $rss_url = "http://feeds.feedburner.com/TechCrunch/";

//    try {
//        $rss_content = file_get_contents($rss_url);
//        if($rss_content !== false) {
//            $rss = simplexml_load_string($rss_content);
//
//            if($rss !== false && $rss !== null) {
//                foreach ($rss->channel->item as $item) {
//                    $post = new Post($item);
//                    $post->save();
//                }
//                return response('Parsed OK', 200);
//            } else {
//                throw new \Exception('Error while parsing the RSS');
//            }
//        }
//    }catch (ErrorException $e) {
//        dd('Error in loading the RSS...'. $e->getMessage());
//        throw new \Exception('Error in loading the RSS...');
//        }

    try {
        $client = new Client();
        $response = $client->get($rss_url);

        $rss_content = $response->getBody()->getContents();

        $rss = simplexml_load_string($rss_content);

        if($rss !== false && $rss !== null) {
            foreach ($rss->channel->item as $item) {
//                $post = new Post($item);
                $post = new Post();
                $post->setProperties($item);
                $post->save();
            }
//            return response('Parsed OK', 200);
        } else {
            throw new \Exception('Error while parsing the RSS');
        }
    } catch (RequestException $e) {
        throw new \Exception('Error in loading the RSS: ' );
    }
    return true;
}

}
