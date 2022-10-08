<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Products;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\File;


// class ProductsController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
     
//     public function __construct()
//     {
//         $this->middleware('auth', ['execept' => ['admin']]);
//     }

//     public function index()
//     {
//         $product = Products::all();
//         dd($product);
//         print_r($product);
//         return view('pages.admin')->with('products', Products::orderBy('updated_at', 'DESC')->get());
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('pages.admin');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//     $request->validate([
//         'productName' => 'required',
//         'productPrice' => 'required',
//         'productDetail' => 'required',
//         'image_path' => 'required|mimes:jpg,png,jpeg',
//     ]);

//     $newImageName = uniqid() . '-' . $request->productName . '-' .
//         $request->image_path->extension();
//     $newImageName = $request->image_path->extension();

//     $request->image_path->move(public_path('img'), $newImageName);

//     Products::create([
//         'productName' => $request->input('productName'),
//         'productPrice' => $request->input('productPrice'),
//         'productDetail' => $request->input('productDetail'),
//         'image_path' => $newImageName,
//         'user_id' => auth()->user()->id
//     ]);

//     return redirect('/pages')->with('message', 'Your Post has been Uploaded!.');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//     return view('pages.show')->with('product', Products::where('id', $id)->first());
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id 
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//     return view('pages.edit')->with('product', Products::where('id', $id)->first());
//     return view('pages.admin', compact('product'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//     $request->validate([
//         'productName' => 'required',
//         'productPrice' => 'required',
//         'productDetail' => 'required',
//     ]);

//     Products::where('id', $id)
//         ->update([
//         'productName' => $request->input('productName'),
//         'productPrice' => $request->input('productPrice'),
//         'productDetail' => $request->input('productDetail'),
//         'user_id' => auth()->user()->id
//     ]);

//     return redirect('/pages')->with('message', 'Your Post has been Updated!.');

//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {

//      $product = Products::where('id', $id);
//     unlink(public_path('img').'/'.$product->$request->image_path->extension());

//     $product->delete();

//     return redirect('/pages')->with('message', 'Your Post has been deleted!.');
//     }
// }





// SECOND PHASE 




// namespace App\Http\Controllers;

// use App\Products;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class E_AgentProductsController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $product = Products::all();
//         dd($product);
//         return view('dashboard');
//         $user = auth()->user();
//         var_dump($user->name);
//         var_dump($user->email);
//         print_r($product);
//         return view('dashboard')->with('products', Products::orderBy('updated_at', 'DESC')->get());
//         $product = DB::table('Products')->where($user->id);
//         $products = DB::table('Products')->where('user_id', '=', $user->id)->get();

//         print_r($product);

//         return view('pages.dashboard', compact('products', $products, 'user', $user->name))->with('no', 1);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\E_AgentProducts  $e_AgentProducts
//      * @return \Illuminate\Http\Response
//      */
//     public function show(E_AgentProducts $e_AgentProducts)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\E_AgentProducts  $e_AgentProducts
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(E_AgentProducts $e_AgentProducts)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\E_AgentProducts  $e_AgentProducts
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, E_AgentProducts $e_AgentProducts)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\E_AgentProducts  $e_AgentProducts
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(E_AgentProducts $e_AgentProducts)
//     {
//         //
//     }
// }

