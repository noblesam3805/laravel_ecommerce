<?php

namespace App\Http\Controllers;
use Auth;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        return view('Auth/login');
    }

    function upload(Request $request)
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

             $product= new Product();
             $product->user_id = Auth::user()->id;
             $product->p_name = $request->input('p_name');
             $product->p_price = $request->input('p_price');
             $product->cat = $request->input('cat');
             $product->desc = $request->input('desc');
             $product->size = $request->input('size');
             $product->images=json_encode($data);
             $product->save();


       return back()->with('success', 'Your product has been successfully added');
    //  $image_code = '';
    //  $images = $request->file('file');
    //  foreach($images as $image)
    //  {
    //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
    //   $image->move(public_path('images'), $new_name);
    //   $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';
    //   $data[] = $new_name;
    //  }





    //  $output = array(
    //   'success'  => 'Product uploaded successfully',
    //   'image'   => $image_code
    //  );
    //  return response()->json($output);

    }
}
