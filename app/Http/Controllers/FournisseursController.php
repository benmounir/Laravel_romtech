<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Fournisseur\FournisseurRequest;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin\fournisseurs\index')->with('fournisseurs' , Fournisseur::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\fournisseurs\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FournisseurRequest $request)
    {
        

        Fournisseur::create([
            'name' =>$request->name,
            'contact_number' =>$request->contact_number,
            'addresse' =>$request->addresse,
            'contact_email' =>$request->contact_email
        ]);

        Session::flash('success' , 'the Fournisseur was created succesfully !');

         return redirect()->route('fournisseurs.index');
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
    public function edit(Fournisseur $fournisseur)
    {
      
        
        return view('admin\fournisseurs\create')->with('fournisseur', $fournisseur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Fournisseur $fournisseur)
    {
       
        
        $this->validate($request , [
            'name' => 'required',
            'contact_number' => 'required|numeric',
            'contact_email' => 'required|email',
            'addresse' => 'required'
        ]);
        
        



        $fournisseur->name =  $request->name ;
        $fournisseur->contact_number = $request->contact_number ;
    
        $fournisseur->contact_email = $request->contact_email ;
        $fournisseur->addresse = $request->addresse ;

        $fournisseur->save();

        Session::flash('success' , 'the Fournisseur was updated succesfully !');

        return redirect()->route('fournisseurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        
        $fournisseur->delete();

        Session::flash('success' , 'the Fournisseur was deleted succesfully !');
        return redirect()->back();
    }
}
