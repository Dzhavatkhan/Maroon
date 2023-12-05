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
        $orders = DB::select("SELECT order_compositions.created_at,order_compositions.id, order_compositions.status,  products.product_name AS 'name', users.name AS 'user', orders.order_price * order_compositions.quantity AS 'price' FROM order_compositions LEFT JOIN orders ON order_compositions.order_id = orders.id LEFT JOIN products ON order_compositions.product_id = products.id LEFT JOIN users ON orders.user_id = users.id");
        $orders = Order_composition::query()->leftJoin("orders", "order_compositions.order_id", "orders.id")->leftJoin("products", "order_compositions.product_id", "products.id")->leftJoin("users", "orders.user_id", "users.id")
        // ->select(DB::raw("order_compositions.created_at"))
        ->select(DB::raw("order_compositions.status, users.name AS 'user', products.product_name AS 'name', order_compositions.id, order_compositions.created_at, orders.order_price * order_compositions.quantity AS 'price'"))
        ->get();

        //,order_compositions.id, order_compositions.status, products.product_name AS 'name', users.name AS 'user',orders.order_price * order_compositions.quantity AS 'price' ")
        $count = DB::select("SELECT COUNT(*) FROM order_compositions LEFT JOIN orders ON order_compositions.order_id = orders.id LEFT JOIN products ON order_compositions.product_id = products.id LEFT JOIN users ON orders.user_id = users.id");
        return view('ajax_blade.orders', compact('orders','count'));
    }
    public function getProducts(){
        $products = DB::select("SELECT products.*, type_skins.name AS 'skin', type_categories.name AS 'category', type_categories.categories_id AS 'ca_id' FROM products LEFT JOIN type_categories ON products.type_categories_id = type_categories.id LEFT JOIN type_skins ON products.type_skins_id = type_skins.id ");
        $products_count = Product::all()->count();
        $cat_for_body = DB::select("SELECT * FROM type_categories WHERE categories_id = 2;");
        $cat_for_face = DB::select("SELECT * FROM type_categories WHERE categories_id = 1;");
        $categories = DB::select("SELECT DISTINCT * FROM categories");
        $skins = DB::select("SELECT * FROM type_skins");
        return view('ajax_blade.products', compact('products', 'products_count', 'cat_for_body', 'cat_for_face', 'categories', 'skins'));


    }
    public function accept(Request $request){
        $id = $request->oc;
        $accept = Order_composition::query()->where("id", $id)->update(["status" => "Оформлен"]);
        if ($accept) {
            return response()->json([
                "message" => "accept"
            ], 200);
        }
        else{
            if ($accept) {
                return response()->json([
                    "message" => "lox"
                ], 502);
            }
        }
    }
    public function cancel(Request $request){
        $id = $request->oc;
        $order = Order_composition::query()->where("id", $id);
        $cancel = $order->delete();
        if ($cancel) {
            return response()->json([
                "message" => $cancel
            ], 200);
        }
        else{
            return response()->json([
                "message" => "not working"
            ], 500);
        }
    }
    public function update_product(Request $request){
        $id = $request->id;
        $image = Product::query()->where('id', $id)->first()->image;
        if (isset($request->image)) {
            if (file_exists("img/products/".$image)) {
                unlink("img/products/".$image);
            }
            $image = uniqid().time().'.'.$request->image->extension();
            $request->image->move(public_path('img/products'), $image);
        }
        $product = Product::query()->where('id', $id);
        $product->update([
            "product_name"=> $request->product_name,
            "type_categories_id" => $request->type_categories_id,
            "type_skins_id" => $request->type_skins_id,
            "brand" => $request->brand,
            "image" => $image,
            "description" => $request->description,
            "quantity" => $request->quantity,
            "price" => $request->price
        ]);
        return redirect()->back();
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
        $data = $request->all([
            "login",
            "name",
            'password'
        ]);
        $admin_created = Admin::create([
            "admin_name" => $data['name'],
            "login" => $data['login'],
            'password' => bcrypt($data['password']),
            "status" => "jun"
        ]);
        if($admin_created){
            return response()->json([
                "message" => "Админ создан"
            ], 200);
        }
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
        $user = User::query()->where("id", $id)->first();
        $product_in_cart = Order::query()->where('id', $id);
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
        $product = Product::query()->where("id", $id)->first();
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
