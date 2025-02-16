<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Category;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('livres.create',compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'pages' => 'required|integer',
            'description' => 'required|string', // Use 'string' instead of 'text'
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer|exists:categories,id' // Ensure category_id exists in categories table
        ]);
$imagePath=null;
if($request->hasFile('img')){
    $imagePath = $request->file('img')->store('images', 'public');
}
Livre::create([
    'titre' => $request->titre,
    'description' => $request->description,
    'pages' => $request->pages,
    'category_id' => $request->category_id,
    'image' => $imagePath,
]);    

return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès !');
}


    public function edit($id)
    {
        $livre = Livre::findOrFail($id);
        $categories = Category::all(); 
        return view('livres.edit', compact('livre','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'pages' => 'required|integer',
            'description' => 'required|string|max:222',
            'image' => 'nullable|image',
            'category_id' => 'required|integer|exists:categories,id' // Ensure category_id exists in categories table
        ]);

        $livre = Livre::findOrFail($id);
        $imagePath = $livre->image; // Default image is the current one

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
        }
        $livre->update([
            'titre' => $request->titre,
            'pages' => $request->pages,
            'description' => $request->description,
            'image' => $imagePath,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('livres.index');
    }

    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('livres.index');
    }
}
