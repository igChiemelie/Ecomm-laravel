<?php

namespace App\Http\Controllers;

use App\Products;
use App\EcommAgentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



// use App\User;

class E_AgentProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth', ['execept' => ['admin']]);
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    
    public function index()
    {
        return view('ecomm.EcommAgent');
    }

    public function ecoms()
    {

        return view('ecomm.EcomForm');
    }

    
    public function fetchProduct()
    {
        // $product = Products::all();
        // $product = Ecommerceagent::all();
        $user = auth()->user();

        // $product = DB::table('Ecommerceagent')->where('user_id', '=', $user->id)->get();
        $product = DB::table('Products')->join('users', 'Products.user_id', '=', 'users.id')
            ->where('user_id', '=', $user->id)
            ->select('Products.*', 'users.username')
            ->orderBy('updated_at', 'desc')
            ->get();

        if ($product) {
            return response()->json([
                'product' => $product,
                'message' => 'No Product yet',
                //   'user_id' = auth()->user()->id;

            ]);
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

            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
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
   
    public function show(E_AgentProducts $e_AgentProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\E_AgentProducts  $e_AgentProducts
     * @return \Illuminate\Http\Response
     */
    // public function edit(E_AgentProducts $e_AgentProducts)
    // {
    //     //
    // }

    public function edit($id)
    {
        $product = Products::find($id);

        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product,
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ]);
        }
    }
   
    public function update(Request $request, $id)
    {

        $product = Products::find($id);

        if ($product) {
            $product->productName = $request->input('productName');
            $product->productPrice = $request->input('productPrice');
            $product->productDetail = $request->input('productDetail');

            if ($request->hasFile('image_path')) {

                $path = 'img/' . $product->image_path;
                if (File::exists($path)) {
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

        
    }

    // public function updateFirstName(Request $request, $id)
    // {

    //     $product = Products::find($id);

    //     if ($product) {
    //         $product->productName = $request->input('fName');
            
    //         $product->update();
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Product Updated Successfully',
    //         ]);
    //     }
    //     else {
    //         return response()->json([
    //             'status' => 400,
    //             'message' => 'Product Not Found',
    //         ]);
    //     }



    // }
    public function updateFirstname(Request $request){
         //validation rules
        $request->validate([ 
            'fName' =>'required|min:4|string|max:255',
        ]);
        $user = Auth::user();
        $user->firstname = $request['fName'];
        $user->save(); 
        return back()->with('message','Profile Updated');
    }
    public function updateLastname(Request $request){
         //validation rules
        $request->validate([ 
            'lName'=>'required|min:4|string|max:255',
        ]);
        $user = Auth::user();
        $user->lastname = $request['lName'];
        $user->save(); 
        return back()->with('message','Profile Updated');
    }
    public function updateUsername(Request $request)
    {
        //validation rules
        $request->validate([
            'uName' => 'required|min:4|string|max:255',
        ]);
        $username = Auth::user();
        $username->username = $request['uName'];
        $username->save();
        return back()->with('message', 'Profile Updated');
    }
    public function updateEmail(Request $request)
    {
        //validation rules
        $request->validate([
            'uEmail' => 'required|email|string|max:255'
        ]);
        $user = Auth::user();
        $user->email = $request['uEmail'];
        $user->save();
        return back()->with('message', 'Profile Updated');
    }
    public function updatePassword(Request $request)
    {
        //validation rules
        $request->validate([  
            'currentpass' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        if($request['currentpass'] = auth()->user()->password){
            $user = Auth::user();
            $user->password = Hash::make($request['password']);
            // $user->email = $request['uEmail'];
            $user->save();
            return back()->with('message', 'Password Updated');
        }else{
            return back()->with('messageError', 'Incorrect Password');

        }
        

    }


    public function fetchProfile()
    {
        $userAuth = auth()->user();
        $user = DB::table('users')->where('users.id', '=', $userAuth->id)->get();

        return response()->json([
            'user' => $user,
            //   'user_id' = auth()->user()->id;

        ]);
    }

    public function fetchDeliveryAgents()
    {
        $user = DB::table('users')->where('users.userType', '=', 'DeliveryAgent')->get();

        return response()->json([
            'user' => $user,
            //   'user_id' = auth()->user()->id;

        ]);
    }

   
    public function destroy($id)
    {
        $product = Products::find($id);
        if ($product) {
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

    public function fetchEcommdetails()
    {

        $use = auth()->user();

        $companyDetails = DB::table('ecomm_agent_details')->where('user_id', '=', $use->id)->get();
        return response()->json([
            'companyDetails' => $companyDetails,
            'message' => 'No Data yet',

        ]);

    }

    public function EAgentDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required',
            'companyAddress' => 'required',
            'companyRcNumber' => 'required',
            'companyMobileNum' => 'required',
            // 'companyLogo' => 'required|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        else {
            $details = new EcommAgentDetails;

            $details->companyName = $request->input('companyName');
            $details->companyAddress = $request->input('companyAddress');
            $details->companyRcNumber = $request->input('companyRcNumber');
            $details->companyMobileNum = $request->input('companyMobileNum');
            $details->user_id = auth()->user()->id;
            // if ($request->hasFile('companyLogo')) {
            //     $file = $request->file('companyLogo');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time() . '.' . $extension;
            //     $file->move(public_path('img'), $filename);
            //     $details->companyLogo = $filename;

            // }
            
            $details->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data Added Successfully',
            ]);
            // return redirect('ecomm')->with('message', 'Your have completed your verification Successfully.');

        }
       
    }
    
}

