<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $admin = Auth::user()->admin_name;
        $admins = Admin::all();
        $users = User::all();
        $admin = Auth::user();
        return view('admin', compact('admin'));
        // return view('admin', [
        //     // "admin"  => $admin,
        //     "users"  => $users,
        //     "admin"  => $admin,
        //     "admins" => $admins
        // ]);
        // return response()->json($users);
    }
    public function getUsers(){
        $users = User::all();
        return view("ajax_blade.users", compact('users'));
    }
    public function getAdmins(){
        $admins = Admin::all();
        return view("ajax_blade.admins", compact('admins'));
    }
    public function getProducts(){
        $products = Product::all();
        $products_count = $products->count();
        return view('ajax_blade.products', compact('products', 'products_count'));


    }

    public function admin_logout(){
        auth('admin')->logout();
        return redirect(route('index'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function addProduct(Request $request)
    {
        $name_image = time().'.'.$request->image->extension();
        $data = [
            "product_name" => $request->product_name,
            "category" => $request->category,
            "brand" => $request->brand,
            "price" => $request->price,
            "description" => $request->description,
            "quantity" => $request->quantity,
            "image" => $name_image,
        ];
        $request->image->move(public_path('img/products'), $name_image);
        $product = Product::create($data);
        if ($product) {
            return response()->json([
                "status" => 200,
                "message" => "Product successful add"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "error"
            ], 500);
        }
    }

    public function add_admin(Request $request)
    {
        //
    }
    public function delete_admin(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return response()->json([
            "status" => "ok",
            "message" => "admin is delete!"
        ], 200);
    }
    public function delete_user(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            "status" => "200",
            "message" => "user is delete!"
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product_id = $product->id;
        if (DB::table('orders')->where('product_id', $product_id)->count() > 0) {
            $order = DB::table('orders')->where('product_id', $product_id);
            $order->delete();
            
        }
        $del = $product->delete();
        if ($del) {
            return response()->json([
                "status" => 200,
                "message" => "Product delete"
            ],200);
        }
        else{
            return response()->json([
                "status" => 500,
                "message" => "Product not delete"
            ],500);
        }
    }
}
