<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaroonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("welcome", compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $category = $product->category;
        $price = $product->price;
        $brand = $product->brand;
        $recomendations = DB::select("SELECT * FROM `products` WHERE `id` <> '$product->id' ORDER BY `created_at` DESC");
        return view('product', compact('product', 'recomendations'));
    }
    public function getCatalog(){
        $products = DB::select("SELECT *, type_categories.name AS 'category' FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id");
        return view('catalog', compact('products'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
