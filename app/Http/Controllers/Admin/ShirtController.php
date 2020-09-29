<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shirt;
use App\Http\Requests\StoreShirt;

class ShirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$shirts=Shirt::all();
        $shirts=Shirt::orderBy('id', 'desc')->paginate(8);
        return view('admin.shirt.index',compact('shirts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shirt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShirt $request)
    {


    //       $validatedData = $request->validate([
    //     'name' => 'required|unique:shirts|max:128',
    //     'price' => 'required|max:1000',
        
    //     'slug' => 'required|unique:shirts|max:128',
    //     'description' => 'required|unique:shirts|max:20044',
    //     'img' => 'required|mimes:jpeg,bmp,png,gif',
    //      'img1' => 'nullable|mimes:jpeg,bmp,png,gif',
    //      'img2' => 'nullable|mimes:jpeg,bmp,png,gif',
    // ]);
        $shirt=new Shirt();
        $shirt->name=$request->name;
        $shirt->slug=$request->slug;
        $shirt->description=$request->description;
        $shirt->price=$request->price;
        $file=$request->file('img');
        
    
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $shirt->img='/uploads/' . $fName;
        
          $file1=$request->file('img1');
        
    if($file1){
            $fName1=$file1->getClientOriginalName();
            $file1->move(public_path('uploads'),$fName1);
            $shirt->img1='/uploads/' . $fName1;
        }
          $file2=$request->file('img2');
        
    if($file2){
            $fName2=$file2->getClientOriginalName();
            $file2->move(public_path('uploads'),$fName2);
            $shirt->img2='/uploads/' . $fName2;
        }

        $shirt->save();
        return redirect('/admin/shirt')->with('success',' Shirt ' . $shirt->name . '  added!');
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
        $shirt=Shirt::findOrFail($id);
        return view('admin.shirt.edit',compact('shirt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShirt $request, $id)
    {
        $shirt=Shirt::findOrFail($id);
        $shirt->name=$request->name;
        $shirt->slug=$request->slug;
        $shirt->description=$request->description;
        $shirt->price=$request->price;
        $file=$request->file('img');
        
    
            $fName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fName);
            $shirt->img='/uploads/' . $fName;
        
          $file1=$request->file('img1');
        
    if($file1){
            $fName1=$file1->getClientOriginalName();
            $file1->move(public_path('uploads'),$fName1);
            $shirt->img1='/uploads/' . $fName1;
        }
          $file2=$request->file('img2');
        
    if($file2){
            $fName2=$file2->getClientOriginalName();
            $file2->move(public_path('uploads'),$fName2);
            $shirt->img2='/uploads/' . $fName2;
        }

        $shirt->save();
        return back()->with('success',' Shirt ' . $shirt->name . '  edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shirt::findOrFail($id)->delete();
        return back();
    }
}
