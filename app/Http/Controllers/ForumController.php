<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('admin.pages.category.categories')->with([
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.pages.forum.new_forum')->with([
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Forum::create($request->all());
        Session::flash('message','Forum Created Successfully');
        Session::flash('alert-class','alert-success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.pages.category.single_category')->with([
            'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.pages.category.edit_category')->with([
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'desc' => 'required'
        ]);
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->desc = $data['desc'];
        $category->user_id = auth()->id();
        if($request->image){
            $image = $request->image;
            $name = $image->getClientOriginalName();
            $new_name = time().$name;
            $dir = 'storage/images/categories/';
            $image->move($dir,$new_name);
        }

        $category->image = $new_name;
        $category->save();
        Session::flash('message','Category Updated Successfully');
        Session::flash('alert-class','alert-success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
            $category->delete();
            Session::flash('message','Category Deleted Successfully');
            Session::flash('alert-class','alert-success');
            return back();
        }
    }
}
