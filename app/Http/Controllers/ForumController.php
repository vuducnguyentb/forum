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
        $forums = Forum::with(['category'])->latest()->paginate(20);
        return view('admin.pages.forum.forums')->with([
            'forums'=>$forums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.forum.new_forum');
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
        $categories = Category::latest()->get();
        $forum = Forum::find($id);
        return view('admin.pages.forum.edit_forum')->with([
            'forum'=>$forum,
            'categories'=>$categories,
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
            'desc' => 'required'
        ]);
        $data = $request->all();
        $forum = Forum::find($id);
       $forum->update($request->all());
        Session::flash('message','Forum Updated Successfully');
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
        $forum = Forum::find($id);
        if($forum){
            $forum->delete();
            Session::flash('message','FORUM Deleted Successfully');
            Session::flash('alert-class','alert-success');
            return back();
        }
    }
}
