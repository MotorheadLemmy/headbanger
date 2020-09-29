<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\StoreReview;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reviews=Review::all();
        $reviews=Review::orderBy('id', 'desc')->paginate(2);
        return view('admin.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReview $request)
    {
    //      $validatedData = $request->validate([
    //     'band' => 'required|max:128',
    //     'album' => 'required|max:128',
    //     'rating' => 'required|max:128',
    //     'tracklist' => 'required|max:1232',
    //     'slug' => 'required|unique:review|max:128',
    //     'description' => 'required|unique:review|max:20044',
    //     'img' => 'nullable|mimes:jpeg,bmp,png,gif',
    // ]);
        $review=new Review();
        $review->band=$request->band;
        $review->album=$request->album;
        $review->slug=$request->slug;
        $review->description=$request->description;
        $review->tracklist=$request->tracklist;
        $review->rating=$request->rating;
        $file=$request->file('img');
        
    if($file){
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $review->img='/uploads/' . $fName;
        }
        $review->save();
        return redirect('/admin/review')->with('success',' Review ' . $review->album . '  added!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review=Review::findOrFail($id);
        return view('admin.review.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReview $request, $id)
    {
        $review=Review::findOrFail($id);
        $review->band=$request->band;
        $review->slug=$request->slug;
        $review->description=$request->description;
        $review->album=$request->album;
        $review->tracklist=$request->tracklist;
        $review->rating=$request->rating;
        $file=$request->file('img');
        
    if($file){
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $review->img='/uploads/' . $fName;
        }
        $review->save();
        return back()->with('success',' Review ' . $review->album . '  edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return back();
    }
}
