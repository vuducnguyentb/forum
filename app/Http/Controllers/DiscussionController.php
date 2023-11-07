<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\DiscussionReply;
use App\Models\Forum;
use App\Models\Topic;
use http\Url;
use Illuminate\Http\Request;
use Telegram;
class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forums = Forum::latest()->get();
        $forum= Forum::find($id);
        return  view('client.new-topic')->with([
            'forums'=>$forums,
            'forum'=>$forum
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notify = 0;
        if($request->notify && $request->notify == 'on'){
            $notify = 1;
        }
        $disscussion = new Discussion();
        $disscussion->title = $request->title;
        $disscussion->desc = $request->desc;
        $disscussion->forum_id = $request->forum_id;
        $disscussion->user_id = auth()->id();
        $disscussion->notify = $notify;
        $disscussion->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Discussion::find($id);
        if($topic){
            $topic->increment('views',1); //tăng view lên 1
        }
        return view('client.topic')->with([
            'topic'=>$topic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = DiscussionReply::find($id);
        $reply->delete();
        toastr()->success('Reply deleted successfully!');
        return back();
    }

    public function reply(Request $request,$id){
        $reply = new DiscussionReply();
        $reply->desc = $request->desc;
        $reply->user_id = auth()->id();
        $disscussion = Discussion::find($id);
        $forumId = $disscussion->forum->id;
        $url = \Illuminate\Support\Facades\URL::to('/forum/overview/'.$forumId);
        $reply->discussion_id = $id;
        $reply->save();
        #khi trả lời sẽ gửi lên nhóm telegram
        Telegram::sendMessage([
           'chat_id'=>env('TELEGRAM_CHAT_ID','-4074031770'),
            'parse_mode'=>'HTML',
            'text'=>'<b>'.auth()->user()->name.'</b>'."Replied to the topic"
            ."<b>".$disscussion->title.": "."</b>"
            ."\n".$request->desc."\n"."<a href='".$url."'>Read it here</a>"
        ]);

        toastr()->success('Reply saved successfully!');

        return back();

    }

    public function updates(){
        $updates = Telegram::getUpdates();
        dd($updates);
    }


}
