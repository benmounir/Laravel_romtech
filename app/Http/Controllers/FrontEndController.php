<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Product;
use App\Setting;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {

        
         $block1 = Product::orderBy('created_at','desc')->where('sub_category_id',5)->skip(2)->take(3)->get();
         $block2 = Product::orderBy('created_at','desc')->where('sub_category_id',6)->skip(2)->take(3)->get();

         return view('index')->with('title', Setting::first()->site_name)
                               ->with('categories' , Category::take(5)->get())
                               ->with('last_product' , Product::orderBy('created_at' , 'desc')->first())
                               ->with('second_Product' , Product::orderBy('created_at' , 'desc')->skip(1)->take(1)->get()->first())
                               ->with('third_Product' , Product::orderBy('created_at' , 'desc')->where('sub_category_id',16)->skip(1)->take(1)->get()->first())
        //                     ->with('HandBall' , Category::find(2))
                               ->with('blok1' ,$block1)
                               ->with('blok2' ,$block2)
                               ->with('setting' , Setting::first());
                            
    }

    public function singleProduct($slug)
    {
         $Product = Product::where('slug', $slug)->first();
        // //$user = User::where('id', $Product->user_id)->first();
         $next_id = Product::where('id' , '>' , $Product->id)->min('id');
         $prev_id = Product::where('id' , '<' , $Product->id)->max('id');

         return view('single')->with('product' , $Product)
                              ->with('title', Setting::first()->site_name)
                              ->with('categories' , Category::take(5)->get())
                              ->with('setting' , Setting::first())
        //                     ->with('tags' , Tag::all())
                              ->with('next' , Product::where('id' , $next_id)->first())
                              ->with('prev' , Product::where('id' , $prev_id)->first());
    }

    public function category($id)   
    {
         $sub_category = SubCategory::find($id);
         
         $category = Category::where('id' , $sub_category->category_id)->first();

    
         return view('admin\categories\page')
                             ->with('category' , $category)
                            ->with('title', $category->name)
                            ->with('categories' , Category::take(5)->get())
                            ->with('setting' , Setting::first());
    }

    public function tag($id)   
    {
        // $tag = Tag::find($id);

        // return view('admin\tags\page')
        //                 ->with('tag' , $tag)
        //                 ->with('title', $tag->name)
        //                 ->with('categories' , Category::take(5)->get())
        //                 ->with('tags' , Tag::all())
        //                 ->with('setting' , Setting::first());
    }
}

