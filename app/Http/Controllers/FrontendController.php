<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('welcome')->with([
            'categories'=>$categories
        ]);
    }

    public function categoryOverview($id){
        $category = Category::find($id);
        return view('client.category-overview')->with([
            'category'=>$category
        ]);
    }

    public function forumOverview($id){
        $forum = Forum::find($id);
        return view('client.forum-overview')->with([
            'forum'=>$forum
        ]);
    }

}
