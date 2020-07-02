<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;
use App\Category;
use App\Fournisseur;
use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin\products\index')->with('products', product::all());
        //return view('admin\products\ajaxdata');
    }
    public function getData()
    {
        $products = Product::select('image','name',	'prix_achat', 'prix_vente');
        return DataTables::of($products)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_categories = SubCategory::all();

        if($sub_categories->count() == 0){

            Session::flash('info', 'you must have some sub_categories before attemting to create a product');

            return redirect()->back();
        }
        $fournisseurs = Fournisseur::all();

        if($fournisseurs->count() == 0){

            Session::flash('info', 'you must have some fournisseurs before attemting to create a product');

            return redirect()->back();
        }

  

        $categories = Category::all();

        return view('admin.products.create')
                                ->with('categories' , $categories)
                                ->with('fournisseurs' , $fournisseurs)
                                ->with('tags' , Tag::all());
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
            'detail' => 'required',
            'image'=> 'required|image',
            'sub_Category_id' => 'required',
            'fournisseur_id' => 'required',
            'price_min' => 'required',
            'price_max' => 'required',
            
         ]);

        
            
         $image = $request->image;

         $new_image = time().$image->getClientOriginalName();

         $image->move('uploads/products' , $new_image);

         $min_price = $request->price_min;
         $max_price = $request->price_max;


         $product = product::create([
             'name' => $request->name,
            //  'slug' => Str::slug($request->name),
             'fournisseur_id' =>$request->fournisseur_id,
             'detail' => $request->detail,
             'prix_achat' => $min_price,
             'prix_vente' => $max_price,
             'sub_category_id' => $request->sub_Category_id,
             'image' => 'uploads/products/' . $new_image
         ]);

        if ($request->tags) {
            $product->tags()->attach($request->tags);
        }
        
        
         
         Session::flash('success' , 'the product was created succesfully !');

         return redirect()->route('products.index');
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
    public function edit(Product $product)
    {
        
        return view('admin\products\edit')
                    ->with('product' , $product)
                    ->with('sub_categories' , SubCategory::all())
                    ->with('fournisseurs' , Fournisseur::all())
                    ->with('tags' , Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'SubCategory_id' => 'required',
            'fournisseur_id' => 'required',
            'price_min' => 'required',
            'price_max' => 'required',
            
         ]);


        if($request->hasFile('image'))
        {
            $image = $request->image;

            $new_image = time().$image->getClientOriginalName();

            $image->move('uploads/products' , $new_image);

            $product->image = 'uploads/products/' . $new_image;
        }

        $product->name        = $request->name;
        $product->prix_achat = $request->price_min;
        $product->prix_vente = $request->price_max;
        $product->detail      = $request->detail;
        $product->sub_category_id  = $request->SubCategory_id;
        $product->fournisseur_id = $request->fournisseur_id;

        $product->tags()->sync($request->tags); 

        $product->save();

        Session::flash('success' , 'the product was updated succesfully !');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        Session::flash('danger', 'the product was trashed');

        return redirect()->back();
    }

    public function trash()
    {
        $products = product::onlyTrashed()->get();

        return view('admin\products\trashed')->with('products' , $products);
    }

    public function kill($id)
    {
        $product = product::withTrashed()->where('id' , $id)->first();

        $product->forceDelete();

        Session::flash('success' , 'the product was deleted permanently');

        return redirect()->back();
    }
    public function killAll()
    {
        $productsDeleted =  product::onlyTrashed()->get();

        foreach ($productsDeleted as $product) {
            $product->forceDelete();
        }
        
        Session::flash('success', 'all product was deleted permanently');

        return redirect()->back();
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->where('id' , $id)->first();

        $product->restore();

        Session::flash('success' , 'the product was restored succesfully');

        return redirect()->route('products.index');
    }

    public function restoreALL()
    {
        $productsDeleted =  product::withTrashed()->get();

        foreach ($productsDeleted as $product) {
            $product->restore();
        }
        

        Session::flash('success', 'All product was restored succesfully');

        return redirect()->route('products.index');
    }
}
