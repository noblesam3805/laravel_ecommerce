<?php
namespace App\Http\Controllers;
session_start();
use Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Order;
use mysqli;
use DB;


class SiteController extends Controller
{
    public function site()
    {
        // Product::all()->paginate(3);
        $products = DB::table('products')->simplePaginate(20);
        if(Auth::user()){
            $car= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->count();
        }
        else{
        $car=0;
        }
            return view('index', compact('products','car'));
    }
    public function shop(Request $request)
    {
        $p_cat = $request->input('p_cat');
        $products = Product::where('cat', $p_cat)->get();
        if(Auth::user()){
            $car= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->count();
        }
        else{
        $car=0;
        }
            return view('shop', compact('products','car'));
    }
    public function view($id)
    {
        $product = Product::find($id);
        if(Auth::user()){
            $car= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->count();
        }
        else{
        $car=0;
        }
        return view('view', compact('product','car'));
    }
    public function delete($id)
    {
        $item = Product::find($id);
        $item->delete();
        session()->flash('message', 'Product Deleted Successfully');
        return redirect('/');
    }
    public function edit($id)
    {
        if(Auth::user()){
            $car= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->count();
        }
        else{
        $car=0;
        }
        $product= Product::find($id);
        return view('edit', compact('product','car'));
    }
    function update(Request $request, $id)
    {
        if($request->hasfile('file'))
        {
           foreach($request->file('file') as $fil)
           {
               $name = rand() .'.'.$fil->extension();
               $fil->move(public_path('images'), $name);
               $data[] = $name;
           }
        }

             $product= Product::find($id);
             $product->user_id = Auth::user()->id;
             $product->p_name = $request->input('p_name');
             $product->p_price = $request->input('p_price');
             $product->cat = $request->input('cat');
             $product->desc = $request->input('desc');
             $product->size = $request->input('size');
             if($request->hasfile('file')){
                $product->images=json_encode($data);
             }
             $product->save();


       return back()->with('success', 'Your product has been successfully updated');
    }
    public function addtocart(Request $request, $id){
        $item=Product::find($id);
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $item->id;
        $cart->p_name = $item->p_name;
        $cart->p_price = $item->p_price;
        $cart->images = $item->images;
        $cart->cat = $item->cat;
        $cart->desc = $item->desc;
        $cart->total = (int)$item->p_price * $request->input('qty');
         $tot = (int)$item->p_price * $request->input('qty');
             $_SESSION['total'] = $tot;
        $cart->size = $request->input('size');
        $cart->qty = $request->input('qty');
        $cart->color = $request->input('color');

        $cart->save();
        return back()->with('success', 'Your product has been successfully added to cart');
    }
    public function cart()
    {
        $car= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->count();
        if(Auth::user() && $car >= 1){
            $cart= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->get();
        }
        else{
            $cart=null;
        }
        $car= Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->count();
        return view('cart', compact('cart','car'));
    }
    public function order(Request $request){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "l_e_app";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
            $id = Auth::user()->id;
        $sql = "UPDATE carts SET status='order' WHERE user_id=$id && status='cart'";

        if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }

        $conn->close();
        return back()->with('success', 'Your order is successful');
    }

    function updateqty(Request $request, $id)
    {
             $cart= Cart::find($id);
             $cart->qty = $request->input('qty');
             $cart->save();


       return back()->with('success', 'Your cart quantity has been successfully updated');
    }
    function updateqtyv($id)
    {
       $cart= Cart::find($id);
       return view('updateqtyv', compact('cart'));
    }
    function m_p_orders(){
        $cart= Cart::where('user_id', Auth::user()->id)->where('status', 'order')->get();
        return view('a_d_pages/m_p_orders', compact('cart'));
    }
    function m_c_orders(){
        $cart= Cart::where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        return view('a_d_pages/m_c_orders', compact('cart'));
    }
    function a_c_orders(){
        $cart= Cart::where('status', 'completed')->get();
        return view('a_d_pages/a_c_orders', compact('cart'));
    }
    function a_p_orders(){
        $cart= Cart::where('status', 'order')->get();
        return view('a_d_pages/a_p_orders', compact('cart'));
    }
    function updatestatus(Request $request, $id)
    {
             $cart= Cart::find($id);
             $cart->status = 'completed';
             $cart->save();


       return back()->with('success', 'Order status marked as completed');
    }
    public function show($id)
    {
        $user= User::find($id);
        return view('a_d_pages/show', compact('user'));
    }
    function u_p_orders(){
        $cart= Cart::where('user_id', Auth::user()->id)->where('status', 'order')->get();
        return view('u_d_pages/m_p_orders', compact('cart'));
    }
    function u_c_orders(){
        $cart= Cart::where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        return view('u_d_pages/m_c_orders', compact('cart'));
    }
    public function settings()
    {
        $user= User::find(Auth::user()->id);
        return view('a_d_pages/settings', compact('user'));
    }
    public function usettings()
    {
        $user= User::find(Auth::user()->id);
        return view('u_d_pages/usettings', compact('user'));
    }
    function psettings(Request $request, $id)
    {
             $user= User::find($id);
             $user->name = $request->input('name');
             $user->email = $request->input('email');
             $user->phone = $request->input('phone');
             $user->address = $request->input('address');
             $user->save();


       return back()->with('success', 'Account details updated successfully');
    }
}
