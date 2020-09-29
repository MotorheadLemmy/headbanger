<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Http\Requests\StoreNews;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $news=News::all();
        $news=News::orderBy('id', 'desc')->paginate(4);
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
    //      $validatedData = $request->validate([
    //     'name' => 'required|unique:news|max:128',
    //     'slug' => 'required|unique:news|max:128',
    //     'description' => 'required|unique:news|max:1044',
    //     'img' => 'nullable|mimes:jpeg,bmp,png,gif',
    // ]);
        $news=new News();
        $news->name=$request->name;
        $news->slug=$request->slug;
        $news->description=$request->description;
        $file=$request->file('img');
        
    if($file){
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $news->img='/uploads/' . $fName;
        }
        $news->save();
        return redirect('/admin/news')->with('success',' Новость ' . $news->name . '  добавлена!');
    


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
        $news=News::findOrFail($id);
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNews $request, $id)
    {
         $news=News::findOrFail($id);
        $news->name=$request->name;
        $news->slug=$request->slug;
        $news->description=$request->description;
        $file=$request->file('img');
        
    if($file){
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $news->img='/uploads/' . $fName;
        }
        $news->save();
        return redirect('/admin/news')->with('success',' Новость ' . $news->name . '  отредактирована!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return back();
    }
}
