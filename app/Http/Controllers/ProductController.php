<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
   public function index(Request $request)
   {
    $products=Product::get();
    return view('products.index', compact('products'));
   }

   public function create(Request $request)
   {
    return view('products.create');
   }

   public function store(Request $request)
   {
    // return view('products.store');
    $request->validate([
        "name"=>"required",
        "detail"=>"required",
    ]);
    Product::create([
        'name' => $request->name,
        'detail' => $request->detail,
   ]);

   return redirect()->route('products.index')->with('success','Le produit a été créé avec succès !');

   }

   public function show(Request $request ,$id)
   {
    $product=Product::find($id);
    return view('products.show', compact('product'));
   }

   public function edit(Request $request , $id)
   {
     $product=Product::find($id);
    return view('products.edit', compact('product'));
   }

   public function update(Request $request,$id)
   {
    // return view('products.store');
    $request->validate([
        "name"=>"required",
        "detail"=>"required",
    ]);
    $product=Product::find($id);
    $product->update([
        "name"=> $request->name,
        "detail"=> $request->detail,

    ]);

   return redirect()->route('products.index')->with('success','Le produit a été mis a jour avec succès !');

   }

      public function destroy(Request $request , $id)
   {
     Product::find($id)->delete();
    return redirect()->route('products.index')->with('success','Le produit a été supprimer avec succès !');
   }

}
