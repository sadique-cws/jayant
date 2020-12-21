<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data['mainCategory'] = Category::where("parent_id",null)->get();
        $data['categories'] = Category::all();
        return view("admin.category",$data);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $cat = new Category();
        if($request->parent_id != "null"){
            $cat->parent_id = $request->parent_id;
        }
        $cat->title = $request->title;
        $cat->description = $request->description;
        $cat->save();
        return redirect()->route('category.index');
    }

   
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
