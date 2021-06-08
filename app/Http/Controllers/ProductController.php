<?php

namespace App\Http\Controllers;
use App\Models\Producer;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
  $subcategory=Subcategory::where('category',$id)->get();

    // $products= Product::find(1)->with(['subcategory'])->where('category',$id)->category->get();
   $products = DB::table('products')
                    ->join('subcategories','subcategories.id','=','products.subcategory')
                    ->where('subcategories.category',$id)
                    ->get('products.*');

       return view('product',['products'=>$products]);
    }
    public function product($id){
        $product=Product::where('id', $id)->first();
        $producer=Producer::where('id',$product->producer)->first();
        $reviews=Review::where('product',$id)->get();
        $users=null;
        $rating=null;
        if(count($reviews)>=1){
        $users=User::whereIn('id',$reviews->pluck(['user']))->get();
        $rating = DB::table('reviews')
        ->where('product', $id)
        ->avg('rating');
       $rating= round($rating,2);
        }

    /*     DB::table('users')
        ->whereIn('id',$reviews)
        ->get('users.*'); */

            return view('product',['product'=>$product,'producer'=>$producer,'reviews'=>$reviews,'users'=>$users,'rating'=>$rating]);
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
        $product = new Product();
        $product->name = request('name');
        $product->producer = request('producer');
        $product->subcategory = request('subcategory');
        $product->description = request('description');
        $messages = [
            'name.required' => 'Zadejte název',
            'main_photo.required' => 'Zadejte soubor',
            'main_photo.mimes' => 'Není obrázek',
            'name.unique' => 'Název již existuje',
            'description.required' =>'Zadejte popisek',
          ];

        $request->validate([
            'main_photo' => 'required|mimes:png,jpg,jpeg',
            'name' => 'required|unique:categories,name',
            'description'=>'required',
        ],$messages);

        $id=DB::table('products')->max('id')+1;
        $file = $request->file('main_photo');
        $file->storeAs('public/photo/product', $id . '.' . $file->getClientOriginalExtension());
        $filename=$id . '.' . $file->getClientOriginalExtension();

        $product->main_photo = $filename;

        $product->save();
        return redirect('/admin')->with('productmsg',"Odesláno");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
