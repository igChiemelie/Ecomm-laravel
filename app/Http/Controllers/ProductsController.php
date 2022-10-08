<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


// use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth', ['execept' => ['admin']]);
        $this->middleware(['auth','verified']);
        // $this->middleware(['auth']);
    }
    
    // public function test()
    // {
    //     return Products::all();
    // }
        public function index()
        {
            return view('pages.admin');
        }
    
    public function fetchProduct($request)
    {
        // $product = Products::all();
   
        $product = DB::table('Products')->join('users', 'Products.user_id', '=',  'users.id')
            ->select('Products.*', 'users.username')
            ->orderBy('updated_at', 'desc')
            ->get();
        // $product = Products::paginate(1);

        

        if ($product) {
            return response()->json([
                // 'product' => $product,
            
                'product' => $product,
                'message' => 'No Product yet',
                //   'user_id' = auth()->user()->id;

            ]);
        }
    }

    
    public function fetch_data(Request $request)
    {
        if($request->ajax()){
            $data = DB::table('Products')->join('users', 'Products.user_id', '=', 'users.id')
                ->select('Products.*', 'users.username')
                ->orderBy('updated_at', 'desc')
                ->paginate(3);

               if ($data) {
                return response()->json([
                    'status' => 200,
                    'product' => $data,
                ]);
            }
        }
    }

    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'productName' => 'required',
            'productPrice' => 'required',
            'productDetail' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else {

            $product = new Products;

            $product->productName = $request->input('productName');
            $product->productPrice = $request->input('productPrice');
            $product->productDetail = $request->input('productDetail');
            $product->user_id = auth()->user()->id;

            if($request->hasFile('image_path')){
                $file =  $request->file('image_path');
                $extension = $file->getClientOriginalExtension();
                $filename =  time() . '.' . $extension;
                $file->move(public_path('img'), $filename);
                $product->image_path = $filename;

            }

            $product->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Added Successfully',
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    // return view('pages.show')->with('product', Products::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);

        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'productName' => 'required',
        //     'productPrice' => 'required',
        //     'productDetail' => 'required',
        //     // 'image_path' => 'required|mimes:jpg,png,jpeg',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'errors' => $validator->messages(),

        //     ]);
        // }

        // else {
            $product = Products::find($id);

            if ($product) {
                $product->productName = $request->input('productName');
                $product->productPrice = $request->input('productPrice');
                $product->productDetail = $request->input('productDetail');

                if ($request->hasFile('image_path')) {

                    $path = 'img/'.$product->image_path;
                    if(File::exists($path)){
                        File::delete($path);
                    }

                    $file = $request->file('image_path');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move(public_path('img'), $filename);
                    $product->image_path = $filename;

                }

                $product->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Updated Successfully',
                ]);
            }
            else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Product Not Found',
                ]);
            }


        // }
        
    }

    // public function fetchProfile()
    // {
    //     $userAuth = auth()->user();
    //     $user = DB::table('users')->where('users.id', '=', $userAuth->id)->get();

    //     return response()->json([
    //         'user' => $user,
    //         //   'user_id' = auth()->user()->id;

    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        if($product){
            $path = 'img/' . $product->image_path;
            if (File::exists($path)) {
                File::delete($path);
            }

            $product->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Product Deleted Successfully',
            ]);
        }
        
    }
    
}
