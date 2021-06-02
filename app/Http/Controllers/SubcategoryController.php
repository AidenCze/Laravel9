<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->name = request('name');
        $subcategory->category = request('category');
        $messages = [
            'name.required' => 'Zadejte název',
            'photo.required' => 'Zadejte soubor',
            'photo.mimes' => 'Není obrázek',
            'name.unique' => 'Název již existuje',
          ];

        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg',
            'name' => 'required|unique:categories,name',
        ],$messages);

        $id=DB::table('subcategories')->max('id')+1;
        $file = $request->file('photo');
        $file->storeAs('public/photo', $id . '.' . $file->getClientOriginalExtension());
        $filename=$id . '.' . $file->getClientOriginalExtension();

        $subcategory->photo = $filename;

        $subcategory->save();
        return redirect('/admin')->with('subcategorymsg',"Odesláno");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
