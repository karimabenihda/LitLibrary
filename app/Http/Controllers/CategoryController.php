<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function create(){
    $categories=Category::all();
   
    return view('livres.create',compact('categories'));
}
public function store(Request $request){
    $request->validate([
        'nom'=>'required|string|max:255',
        'description'=>'required|string'
    ]);
}
}
