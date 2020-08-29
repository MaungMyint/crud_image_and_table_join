<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $organizers=Product::all();
        return view('product.index',compact('organizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $organizers=Product::all();

        $categories=Category::all();
        return view('product.create',compact('organizers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->hasfile('image');
        $image=$request->file('image');
        $name=$image->getClientOriginalName();
        $image->move(public_path().'/images/',$name);
        $image='/images/'.$name;


    Product::create([
        'name'=>request('oname'),
        'image'=>$image,
        'category_id'=>request('category'),
    ]);
    return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $organizers=Product::find($id);
        $categories=Category::all();

        return view('product.edit',compact('organizers','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if ($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/',$name);
            $image='/images/'.$name;
        }
        else
        {
             $image = request('oldimage');
        }
        $organizers=Product::find($id);
        $organizers->name=request('oname');
        $organizers->category_id=request('category');

        $organizers->image=$image;
        $organizers->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $organizers=Product::find($id);
        $organizers->delete();
        return redirect()->route('product.index');
    }
}
