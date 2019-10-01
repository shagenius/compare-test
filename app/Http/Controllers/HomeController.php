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
        $results = $flickr->request('flickr.photos.search', array('text'=>urlencode($category), 'privacy_filter'=>1, 'per_page'=>50));
        
        $categories = Category::all();
        return view('gallery', ['categories' => $categories, 'images'=>$results->photos, 'category'=>$category]);
    }
    
    public function photo($id, $category)
    {
        $categories = Category::all();
        
        $category =  $category;
        
        $flickr = new Flickr(new Api(env('FLICKR_KEY')));

        // https://www.flickr.com/services/api/flickr.photosets.getList.html
        $result = $flickr->photoInfo(urlencode($id));
        
        return view('photo', ['categories' => $categories, 'photo'=>$result->photo, 'category'=>$category]);
    }
}
