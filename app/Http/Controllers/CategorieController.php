<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view("categories.index", compact("categories"));
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            "name" => "required|max:255",
        ]);
        Categorie::create($request->all());
        return redirect("/")->with("success", "categorie added");
    }

    public function delete(Categorie $categorie)
    {
        $categorie->delete();
        return redirect("/")->with("success", "categorie deleted");
    }

    public function edit(Categorie $categorie)
    {
        return view("categories.edit", compact("categorie"));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            "name" => "required|max:255",
        ]);
       $categorie->update($request->all());
       return redirect("/")->with("success","categorie updated");
    }
}
