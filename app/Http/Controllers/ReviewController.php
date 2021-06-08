<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        session(['form' => 'review']);
        $review= new Review();
        $review->commentary=request('commentary');
        $pros = explode(PHP_EOL, request('pros'));
        $review->pros=$pros;
        $cons = explode(PHP_EOL, request('cons'));
        $review->cons=$cons;
        $review->rating=request('rating');

        $review->user=Auth::user()->id;
        $review->product=$id;
        $messages = [
            'commentary.required' => 'Zadejte obsah',
            'rating.required'=>'Vyberte hodnocení'
          ];

        $request->validate([
            'commentary' => 'required',
            'rating'=>'required',
        ],$messages);
       if (Review::where('user',$review->user)->first()==null){
        $review->save();
        return back()->with('msg','Recenze uložena');
       }
       else return back()->with('error','Lze přidat pouze 1 recenzi na 1 produkt');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
