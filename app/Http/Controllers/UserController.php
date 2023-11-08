<?php
//hello, my name is Gustavo, but you can called me just Gus
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;
use function Laravel\Prompts\select;
use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $prosto = 1;
        $count = Order::all()->where("user_id", '=', $user->id)->count();
        $orders = DB::table('orders')->where("user_id", '=', $user->id);
        $recomendations = DB::select("SELECT DISTINCT * FROM `products` LEFT JOIN orders ON products.id = orders.product_id WHERE orders.user_id != $user->id ORDER BY products.created_at ASC");
        $rec_count = Product::query()->leftJoin('orders', 'products.id','orders.product_id')->where('orders.user_id', '!=', $user->id)->count();
        $products = DB::select("SELECT DISTINCT orders.quantity AS 'ordr_qnt', products.* FROM `orders` LEFT JOIN `products` ON `orders`.`product_id` = `products`.`id`;");
        return view('auth.profile', compact('user', 'products', 'count', 'recomendations', 'rec_count'));
    }

    public function getCart(){

        $user = Auth::user();
        $price_list = DB::select("SELECT SUM(order_price) FROM `orders` WHERE `user_id` = $user->id");
        $price_list = Order::all()->where("user_id", "=", $user->id);
        $price_list = $price_list->sum("order_price");
        $count = Order::all()->where('user_id', '=', $user->id)->count();
        $products = DB::select("SELECT DISTINCT products.*, type_categories.name AS 'category', orders.quantity AS 'qu' FROM `orders` LEFT JOIN `products` ON `orders`.`product_id` = `products`.`id` LEFT JOIN type_categories ON products.type_categories_id = type_categories.id WHERE `orders`.`user_id` = $user->id; ");
        return view('ajax_blade.count', compact('products', 'count', 'price_list'));
    }

    public function signIn(){
        return view('auth.auth');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function signUp(AuthRequest $request)
    {
        $login    = $request->reg_login;
        $name     = $request->reg_name;
        $avatar   = $request->reg_avatar;
        $token    = $request->_token;
        $password = $request->reg_password;
        $upload_folder = 'public/img/profiles';
        $avatar = time().'.'.$avatar->extension();
        $request->reg_avatar->move(public_path('img/profiles'),$avatar );
        $user = User::create([
            "login"    => $login,
            "name"     => $name,
            "avatar"   => $avatar,
            "password" => bcrypt($password),
            "remember_token" => bcrypt($token)
        ]);
        if ($user) {
            auth('web')->login($user);
            return redirect()->route('signIn');
        }
    }

    public function login(Request $request){
            $data = $request->validate([
                "login" => ['string', 'required'],
                "password" => ['required']
            ]);

        if (auth('web')->attempt($data)) {
            return redirect(route("profile", Auth::user()->id));
        }
        if (auth('admin')->attempt($data)) {
            return redirect(route("admin"));
        }


        return redirect(route('signIn'))->withErrors([
        "login" => "Пользователь не найден, либо данные были введены неверно"
    ]);
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route('index'));
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
    public function plus_balance(Request $request){
        $id  = Auth::user()->id;
        $us_b = DB::select("SELECT balance FROM users WHERE id = $id");
        foreach ($us_b as $b){
            $us_b = $b->balance;
        }
        $balance = str_replace(' ', '', $request->balance);
        $balance = $balance + $us_b;
        User::where('id', $id)->update(
            [ 
                "balance" => $balance
            ]
            );
            return redirect()->back();
    }
    public function update(Request $request)
    {
        $id  = Auth::user()->id;
        $user = User::findOrFail($id);
        $avatar = $request->avatar;
        $avatar_name = time().'.'.$avatar->extension();
        $password = $request->password;
            if ($request->password == $request->password_conf) {
                if ($password == null) {
                    $password = $user->password;
                }
                if ($request->avatar) {
                    if ($request->avatar === $user->avatar) {
                        $avatar = $user->avatar;
                    }
                    else{
                        $del_file = public_path('img/profiles/'.$user->avatar);
                        if (file_exists($del_file)) {
                            unlink(public_path('img/profiles/'.$user->avatar));
                        }
                        $request->avatar->move(public_path('img/profiles'), $avatar_name);
                    }



                    User::where('id', $id)->update(
                [
                    "name" => $request->name,
                    "login"=> $request->login,
                    "avatar" => $avatar_name,
                    "password" => bcrypt($password)
                ]
                );
                }
                    else{
                        User::where('id', $id)->update([
                                "name" => $request->name,
                                "login"=> $request->login,
                                "password" => $password
                        ]);
            }
        }



        return redirect()->route('profile', Auth::user()->id);

    }
    public function add_cart(Request $request){

        $user_id = Auth::user()->id;
        $product_id = $request->id;

        $quantity = Order::all()->where("user_id", "=", $user_id)->where('product_id', $product_id);
        $quantity = $quantity->sum('quantity');
        if ($quantity == 0) {
            $quantity = 1;
        }
        elseif ($quantity == "NULL") {
            $quantity = 1;
        }
        $count = Order::all()->where("user_id", "=", $user_id)->where('product_id', $product_id)->count();

        if ($count != 0) {
            $quantity = $quantity +1;

            Order::where('product_id', $product_id)->where('user_id', $user_id)->update([
                "quantity" => $quantity
            ]);
        }


        else{
            $quantity = 1;
            $price = Product::findOrFAil($product_id)->price;
            $order = Order::create([
                "user_id"  => $user_id,
                "quantity" => $quantity,
                "product_id" => $product_id,
                "order_price" => $price,
                "order_status" => "normal"
            ]);
            if ($order) {
                return response()->json([
                "status" => 200,
                "message" => "Successful",
                "quantity" => $quantity
            ], 200);
            }
    }


    }
    public function delete_cart(Request $request){
        $product_id = $request->id;
        $user_id = Auth::user()->id;
        $product = Order::query()->where('user_id', $user_id)->where('product_id', $product_id)->first();
        $quantity = Order::all()->where("user_id", "=", $user_id)->where('product_id', $product_id);
        $quantity = $quantity->sum('quantity');
        if ($quantity == 1) {
            $product->delete();
            return response()->json([
                "status" => 200,
                "message" => "Is delete"
            ], 200);
        }
        else if ($quantity > 1) {
            $quantity = $quantity -1;
            Order::where('product_id', $product_id)->where('user_id', $user_id)->update([
                "quantity" => $quantity
            ]);
            return response()->json([
                "status" => 200,
                "message" => "Is delete"
            ], 200);
        }
        else if ($quantity = "NULL") {
            $product->delete();
            return response()->json([
                "status" => 200,
                "message" => "Is delete"
            ], 200);
        }
        else{
            return response()->json([
                "status" => 500,
                "message" => "No delete"
            ], 500);
        }



        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
