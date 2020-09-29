<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Review;
use App\Interview;
use App\Shirt;
use App\Comment;

class MainController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')
                ->first();

    
        $review = Review::orderBy('id', 'desc')
                ->first();
        $interview=Interview::orderBy('id', 'desc')
                ->first();

    	return view('main.index',compact('review','news','interview'));

    }
    public function news()
    {
    	$news=News::orderBy('id', 'desc')->paginate(4);
    	

    	return view('news.news',compact('news'));
    }
     public function onenews(string $slug)
    {
    	
         $news=News::firstWhere('slug',$slug);
       
    	return view('news.onenews',compact('news'));

    }
     public function reviews()
    {
    	$reviews=Review::orderBy('id','desc')->paginate(4);
        
    	
    	return view('reviews.reviews',compact('reviews'));

    }
     public function review(string $slug)
    {
    	$review=Review::firstWhere('slug',$slug);
        
    	
    	return view('reviews.review',compact('review',));

    }
     public function interviews()
    {
    	$interviews=Interview::orderBy('id','desc')->paginate(4);
    	
    	return view('interviews.interviews',compact('interviews'));

    }
       public function interview(string $slug)
    {
    	$interview=Interview::firstWhere('slug',$slug);
    	
    	return view('interviews.interview',compact('interview'));

    }
    public function showShirts()

    {
        $shirts=Shirt::all();
        return view('buy.shirts',compact('shirts'));
    }
    public function oneShirt(string $slug)
    {
        $shirt=Shirt::firstWhere('slug',$slug);
        
        return view('buy.shirt',compact('shirt'));
    }
    public function contacts()
    {
        return view('contacts.contacts');
    }
    public function getCommentNews(Request $request)
    {
        $news=News::find($request->news);
        $comment=new Comment();
        $comment->review=$request->comment;
        $comment->user_id=$request->user;
        $news->comments()->save($comment);

        return back();
    }
    public function getCommentReview(Request $request)
    {
        $review=Review::find($request->review);
        $comment=new Comment();
        $comment->review=$request->comment;
        $comment->user_id=$request->user;
        $review->comments()->save($comment);

        return back();
    }
    public function getCommentInterview(Request $request)
    {
          $interview=Interview::find($request->interview);
        $comment=new Comment();
        $comment->review=$request->comment;
        $comment->user_id=$request->user;
        $interview->comments()->save($comment);

        return back();
    }
    public function getResults(Request $request)
    {
        $query=$request->input('query');
        if(!$query){
           return redirect('/');
        }
        $news=News::where('name','LIKE','%'.$query.'%')->get();
       
        $reviews=Review::where('band','LIKE','%'.$query.'%')->get();
        $interviews=Interview::where('name','LIKE','%'.$query.'%')->get();
        $shirts=Shirt::where('name','LIKE','%'.$query.'%')->get();
        
        return view('search.results',compact('news','reviews','interviews','shirts'));
    }


}
