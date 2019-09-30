<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Category::rules());
        
        if ($validator->fails()) {
            return redirect('categories/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $category = new Category;
            echo $request->get('name');
            $category->name       = $request->get('name');
            $category->active      = $request->has('active') ? true : false;
            $category->save();

            // redirect
            Session::flash('message', 'Category created!');
            return Redirect::to('categories');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
       return view('category.show', ['category' => Category::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Category::rules());
        
        if ($validator->fails()) {
            return Redirect::to('categories/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $category = Category::find($id);
            $category->name       = $request->get('name');
            $category->active      = $request->has('active') ? true : false;
            $category->save();

            // redirect
            Session::flash('message', 'Category updated!');
            return Redirect::to('categories');
        }
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
         // delete
        $category = Category::find($id);
        $category->delete();

        // redirect
        Session::flash('message', 'Category deleted!');
        return Redirect::to('categories');
    }
}
