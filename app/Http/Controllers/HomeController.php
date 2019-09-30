<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use JeroenG\Flickr\Flickr;
use JeroenG\Flickr\Api;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    /**
     * Show the application Flickr Gallery.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery(Request $request)
    {
        $category =  $request->category;
        
        $flickr = new Flickr(new Api(env('FLICKR_KEY')));

        // https://www.flickr.com/services/api/flickr.photosets.getList.html
        $results = $flickr->request('flickr.photos.search', array('text'=>urlencode($category), 'privacy_filter'=>1));
        
        $categories = Category::all();
        return view('gallery', ['categories' => $categories, 'images'=>$results->photos]);
    }
    
    public function photo($id)
    {
        $categories = Category::all();
        
        $flickr = new Flickr(new Api(env('FLICKR_KEY')));

        // https://www.flickr.com/services/api/flickr.photosets.getList.html
        $results = $flickr->request('flickr.photos.getInfo', array('id'=>urlencode($id)));
        
        print_r($results);exit;
        return view('photo', ['categories' => $categories, 'images'=>$results->photos]);
    }
}
