<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get("query");
        $products = Product::where('name', 'LIKE', "%$query%")->paginate(2);
        return view("product.index", compact("products"));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $categories = Categorie::all();
        return view("product.create", compact("products", 'categories', 'users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required",
            "user_id" => "required",
            "categorie_id" => "required",
            "image_path" => 'required||image|mimes:png,jpg,jpeg,gif,svg|max:1000'
        ]);


        $destinationPath = 'public/images/products';
        $extension = $request->file("image_path")->getClientOriginalExtension();
        $newFilename = date('YmdHism') . "." . $extension;
        $request->file("image_path")->storeAs($destinationPath, $newFilename);


        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => $request->user_id,
            'categorie_id' => $request->categorie_id,
            'image' => $newFilename
        ]);
        return redirect("/product")->with("success", "Product has been saved");
    }

    public function delete(Product $product)
    {

        $product->delete();
        return redirect("/product")->with("success", "Product deleted");

    }

    public function edit(Request $request, string $id)
    {

        $product = Product::find($id);

        $users = User::all();
        $categories = Categorie::all();

        $user = User::find($product->user_id);

        $categorie = Categorie::find($id);
        return view("product.edit", compact("users", "product", "categories", "user", "categorie"));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required",
            "user_id" => "required",
            "categorie_id" => "required",
            "image_path" => 'image|mimes:png,jpg,jpeg,gif,svg|max:1000'
        ]);

        // Handle file upload
        if ($request->hasFile('image_path')) {

            $destinationPath = 'public/images/products';
            $extension = $request->file("image_path")->getClientOriginalExtension();
            $newFilename = date('YmdHism') . "." . $extension;
            $request->file("image_path")->storeAs($destinationPath, $newFilename);


            if (Storage::exists('public/images/products/' . $product->image)) {
                Storage::delete('public/images/products/' . $product->image);
            }

            // Update product with new image path
            $product->update(array_merge($request->except('image_path'), ['image' => $newFilename]));

        } else {
            // Update product without updating the image
            $product->update($request->except('image_path'));
        }

        return redirect('/product')->with("success", "Product updated");
    }


    public function showdashboard(Request $request)
    {
        $products = Product::all();
        return view('dashboard', compact("products"));
    }


}
