<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("product.index",compact("products"));
    }

    public function create(){
        //return view("product.create");
        $products = Product::all();
        $users = User::all();
        $categories = Categorie::all();
        return view("product.create",compact("products", 'categories', 'users'));
}

    public function store(Request $request){

        $request->validate([

            "name" => "required|max:255",
            "description" => "required",
            "price" => "required",
            "user_id" => "required",
            "categorie_id" => "required",
            "image_path" => 'required||image|mimes:png,jpg,jpeg,gif,svg|max:1000'
        ]);

        if ($image = $request->file('image_path')) {

            $destinationPath = 'assets/images/';
            $productImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $request['image_path'] = $productImage;
        }

        Product::create([
            'name' => $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'user_id'=> $request->user_id,
            'categorie_id'=> $request->categorie_id,
            'image' => $productImage

        ]);
        return redirect("/product")->with("success"," product add");
    }
     public function delete(Product $product)
     {

         $product->delete();
         return redirect("/product")->with("success", "Product deleted");

     }

     public function edit(Request $request,string $id)
     {

         $product = Product::find($id);

         $users = User::all();
         $categories = Categorie::all();

         $user = User::find($product->user_id);

         $categorie = Categorie::find($id);
         return view("product.edit",compact("users","product","categories", "user","categorie"));
     }

     public function update(Request $request, Product $product){

         $request->validate([
             "name" => "required|max:255",
             "description" => "required",
             "price" => "required",
             "user_id" => "required",
             "categorie_id" => "required",
             "image_path" => 'required||image|mimes:png,jpg,jpeg,gif,svg|max:1000'
         ]);
         $product->update($request->all());
         return redirect("/product")->with("success","product updated");
     }



}
