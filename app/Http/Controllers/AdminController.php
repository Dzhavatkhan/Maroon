<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Order_composition;
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
        $cat_for_body = DB::select("SELECT * FROM type_categories WHERE categories_id = 2;");
        $cat_for_face = DB::select("SELECT * FROM type_categories WHERE categories_id = 1;");
        $categories = DB::select("SELECT DISTINCT * FROM categories");
        $skins = DB::select("SELECT * FROM type_skins");
        return view('admin', compact('admin', 'categories','cat_for_face','cat_for_body', 'skins'));
        // return view('admin', [
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
    public function getOrders(){
        $orders = DB::select("SELECT order_compositions.id, orders.order_price, products.product_name AS 'name', order_compositions.created_at, users.name AS 'user_name' FROM `order_compositions` LEFT JOIN orders ON orders.id = order_compositions.id LEFT JOIN products ON order_compositions.product_id = products.id LEFT JOIN users ON users.id = orders.user_id");
        $count = DB::select("SELECT COUNT(*) FROM `order_compositions` LEFT JOIN orders ON orders.id = order_compositions.id LEFT JOIN products ON order_compositions.product_id = products.id LEFT JOIN users ON users.id = orders.user_id");
        return view('ajax_blade.orders', compact('orders','count'));
    }
    public function getProducts(){
        $products = DB::select("SELECT *, type_skins.name AS 'skin', type_categories.name AS 'category' FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id LEFT JOIN type_skins ON products.type_skins_id = type_skins.id ");
        $products_count = Product::all()->count();
        $cat_for_body = DB::select("SELECT * FROM type_categories WHERE categories_id = 2;");
        $cat_for_face = DB::select("SELECT * FROM type_categories WHERE categories_id = 1;");
        $categories = DB::select("SELECT DISTINCT * FROM categories");
        $skins = DB::select("SELECT * FROM type_skins");
        return view('ajax_blade.products', compact('products', 'products_count', 'cat_for_body', 'cat_for_face', 'categories', 'skins'));


    }
    public function update_product(Request $request, $id){
        dd($request->all());
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
            "type_categories_id" => $request->type_categories_id,
            "type_skins_id" => $request->type_skins_id,
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
        $product_in_cart = Order::query()->where('user_id', $id);
        if ($product_in_cart->count() > 0) {
            $product_in_cart->delete();
        }
        if (file_exists(public_path('img/profiles/'.$user->avatar))) {
            unlink(public_path('img/profiles/'.$user->avatar));
        }
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
