<?php

namespace App\Http\Controllers;
use App\Tag;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    //**
    /* Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return view('admin\sub_categories\index')->with('sub_categories', SubCategory::all());
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
        $categories = Category::all();
        if($categories->count() == 0){

            Session::flash('info', 'you must have some categories before attemting to create a product');

            return redirect()->back();
        }
       return view('admin\sub_categories\create')
                    ->with('tags', Tag::all())
                    ->with('categories', Category::all());
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $this->validate($request, [
           'name' => 'required',
           'category_id' => 'required'
       ]);

       $sub_category = new SubCategory;
       $sub_category->name = $request->name;
       $sub_category->Category_id = $request->category_id;
       $sub_category->save();

       
       Session::flash('success' , 'you succesfully created a new sub_category');

       return redirect()->route('sub_categories.index');
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
       $sub_category = SubCategory::find($id);

       return view('admin\sub_categories\edit')->with('sub_category', $sub_category);
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
       $sub_category = SubCategory::find($id);
       
       $this->validate($request, [
           'name' => 'required'
       ]);

       $sub_category->name = $request->name;
       $sub_category->save();
       Session::flash('success' , 'you succesfully update the sub_category');

       return redirect()->route('sub_categories.index');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $sub_category = SubCategory::find($id);

    //    foreach($sub_category->posts as $post){
    //        $post->delete();
    //    }

       $sub_category->delete();

       Session::flash('danger' , 'you succesfully deleted the sub_category');

       return redirect()->route('sub_categories.index');
   }
}
