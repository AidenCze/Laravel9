<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers=Producer::all();
        return view('admin',['producers'=>$producers]);
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
        $producer = new Producer();

        $producer->name = request('name');
        $producer->url = request('url');

        $messages = [
            'name.required' => 'Zadejte název',
            'url.required' => 'Zadejte URL',
            'name.unique' => 'Název již existuje',
            'url.unique' => 'URL již existuje',
          ];

        $request->validate([
            'name' => 'required|unique:producers,name',
            'url' => 'required|unique:producers,url',
        ],$messages);

        $producer->save();
        return redirect('/admin')->with('producermsg',"Odesláno");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show(Producer $producer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(Producer $producer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producer $producer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producer::where('id', $id)->delete();
        return redirect('/admin')->with('proddltmsg','Smazáno');
    }
}
