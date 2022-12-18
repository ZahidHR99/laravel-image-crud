<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageCrud;
use Session;
use File;

class ImageCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ImageCrud::all();
        return view('home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);

        $imageName = '';
        
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images',$imageName);
        }

        ImageCrud::create([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);

        Session::flash('msg', 'Data Added Successfully');
        return redirect()->back();
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
        $product = ImageCrud::findorFail($id);
        return view('edit_product',compact('product'));
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
        $product = ImageCrud::findorFail($id);
        
        $request->validate([
            'name'=>'required',
        ]);

        $imageName = '';

        $deleteOldImage = 'images/'.$product->image;

        if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images',$imageName);
        }else{
            $imageName = $product->image;
         
        }

        ImageCrud::where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);

        Session::flash('msg', 'Data Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ImageCrud::findorFail($id);
        $deleteOldImage = 'images/'.$product->image;

        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        Session::flash('msg', 'Data Deleted Successfully');
        return redirect()->back();
    }
}
