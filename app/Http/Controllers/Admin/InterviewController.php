<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interview;
use App\Http\Requests\StoreInterview;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews=Interview::orderBy('id', 'desc')->paginate(2);
        return view('admin.interview.index',compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interview.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterview $request)
    {
    //          $validatedData = $request->validate([
    //     'name' => 'required|unique:interviews|max:128',
    //     'slug' => 'required|unique:interviews|max:128',
    //     'description' => 'required|unique:interviews|max:25044',
    //     'img' => 'nullable|mimes:jpeg,bmp,png,gif',
    // ]);
        $interview=new Interview();
        $interview->name=$request->name;
        $interview->slug=$request->slug;
        $interview->description=$request->description;
        $file=$request->file('img');
        
    if($file){
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $interview->img='/uploads/' . $fName;
        }
        $interview->save();
        return redirect('/admin/interview')->with('success',' Интервью ' . $interview->name . '  добавлено!');
    


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
        $interview=Interview::findOrFail($id);
        return view('admin.interview.edit',compact('interview'));
    }
       

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInterview $request, $id)
    {
         $interview=Interview::findOrFail($id);
        $interview->name=$request->name;
        $interview->slug=$request->slug;
        $interview->description=$request->description;
        $file=$request->file('img');
        
    if($file){
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $interview->img='/uploads/' . $fName;
        }
        $interview->save();
        return back()->with('success',' Интервью ' . $interview->name . '  отредактировано!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Interview::findOrFail($id)->delete();
        return back();
    }
}
