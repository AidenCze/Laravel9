<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Category;
use App\Models\Producer;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $producers=Producer::all();
        return view('admin',['categories'=>$categories, 'producers'=>$producers]);
    }
}
