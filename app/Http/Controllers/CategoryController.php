<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin',['categories'=>$categories]);
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
        $category = new Category();
        $category->name = request('name');
        $category->main_category=request('main_category');
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

        $id=DB::table('categories')->max('id')+1;
        $file = $request->file('photo');
        $file->storeAs('public/photo/category', $id . '.' . $file->getClientOriginalExtension());
        $filename=$id . '.' . $file->getClientOriginalExtension();

        $category->photo = $filename;

        $category->save();
        return redirect('/admin')->with('categorymsg',"Odesláno");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect('/admin')->with('catdltmsg','Smazáno');
    }
}
