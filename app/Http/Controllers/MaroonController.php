<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type_category;
use App\Models\Type_skin;
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

        $products = DB::select("SELECT *, products.id AS 'product_id', type_categories.name AS 'category' FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id ");
        $category_face = Type_category::all()->where('categories_id', 1);
        $category_body = Type_category::all()->where('categories_id', 2);
        $type_skin = Type_skin::all();

        return view('catalog', compact('category_face', 'products', 'category_body','type_skin'));
    }
    public function filter(Request $request){
        $skin = $request->skin;
        $q = 1;
        $body_query = $request->category_body;
        $face_query = $request->category_face;
        $products = DB::select("SELECT *,products.id AS 'product_id', type_categories.name AS 'category' FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id ");
        if ($skin == '' && $body_query == '' && $face_query == '') {
            $q = 0;
        }
        elseif($skin == 'null' && $body_query == 'null' && $face_query == 'null'){
            $q = 0;
        }
        elseif($skin == null && $body_query == null && $face_query == null){
            $q = 0;
        }
        else {
            $products = DB::select("SELECT *, products.id AS 'product_id', type_categories.name AS 'category' FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id WHERE products.type_categories_id = $body_query OR products.type_categories_id = $face_query OR products.type_skins_id = $skin");
            $count = DB::select("SELECT COUNT(*) FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id WHERE products.type_categories_id = $body_query OR products.type_categories_id = $face_query OR products.type_skins_id = $skin");
            if ($count == 0) {
                $q = 0;
            }
        }
        

            return view('ajax_blade.filter', compact('q','body_query','face_query','skin', 'products'));
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
    public function pay(Request $request)
    {
        $id[] = $request->product_id;
        return  response()->json($id);
    }
}
