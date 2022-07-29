<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $tweets = Tweet::latest()->get();  
        logger($tweets);
        return view('posts.timeline')->with(["tweets"=>$tweets ]);
    }

    public function postTweet(Request $request)
    {
        $validator = $request->validate([
            'tweet' => ['required', 'string', 'max:280'],
        ]);
        Tweet::create([
            'user_id' => Auth::user()->id,
            'tweet' => $request->tweet,
        ]);
        return redirect("posts/timeline");
     }
    
      public function delete(Tweet $tweets)
      {
        $tweets->delete();
         return redirect('/');
      }
    
    public function edit(Tweet $tweets)
    {
    return view('posts.edittimeline')->with(["tweets"=>$tweets]);
    }
   
    public function editname(Request $request, Tweet $tweets)
    {
    $input_post = ['user_id' => $request->user()->id]; 
    $body=$request->input('text');
    $tweets->fill($input_post);
    return redirect('/posts/timeline' . $tweets->id);
    }
    
  public function update(Request $request, Tweet $tweets)
 {
    $input_tweets = $request['Tweet'];
    $Tweet->fill($input_twees)->save();
    return redirect('/posts/timeline' . $tweets->id);
 }
 
 public function vote(Request $request, Tweet $tweets)
 {
    $input_tweets = $request['Tweet'];
    $Tweet->fill($input_twees)->save();
    return view('/posts/timelinevote' );
 }
} 