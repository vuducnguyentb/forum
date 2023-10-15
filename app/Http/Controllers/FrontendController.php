<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalsMember = count(User::all());
        $categories = Category::latest()->get();
        $totalCategories = count(Category::all());
        $newest = User::latest()->first();
        return view('welcome')->with([
            'categories'=>$categories,
            'forumsCount'=>$forumsCount,
            'topicsCount'=>$topicsCount,
            'newest'=>$newest,
            'totalsMember'=>$totalsMember,
            'totalCategories'=>$totalCategories,
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
