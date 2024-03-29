<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Services\ParserRssService;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\HttpFoundation\JsonResponse;
//use function PHPUnit\Framework\isInstanceOf;
//use function PHPUnit\Framework\throwException;
//use SimpleXMLElement;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $search = $request->query('search');
        if($search){
            $posts = Post::query()
                ->where('title', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $posts = Post::paginate(10);
        }
        if($posts) {
           return response($posts);
        }
//        $parserRss = ParserRssService::parseRss();
//        if($parserRss) {
//            return response('Parsed OK', 200);
//        }

//        dd($parser);
//        $rss_url = "http://feeds.feedburner.com/TechCrunch/";
////        $rss_url = "https://lifehacker.com/feed/rss";
//        $rss_content = file_get_contents($rss_url);
//        if($rss_content !== false) {
//            $rss = simplexml_load_string($rss_content);
//
//            if($rss !== false) {
//                foreach ($rss->channel->item as $item) {
//                    $post = new Post($item);
//                    $post->save();
//                }
//            } else {
//                echo 'Error while parsing the RSS';
//                throw new \Exception('Error while parsing the RSS');
//            }
//        } else {
//            throw new \Exception('Error in loading the RSS...');
//        }
//        return response('Parsed OK', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
