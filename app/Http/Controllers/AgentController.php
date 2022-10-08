<?php

// namespace App\Http\Middleware;
namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Products;
use App\Contact;
use App\Agent;
use Laravel\Socialite\Facades\Socialite;


class AgentController extends Controller
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
        return view('agent.index');
    }

    public function fetchNotify()
    {
        //
        // $piu = Contact::all();
        // print_r($piu);
        // $product = DB::table('Products')->join('users', 'Products.user_id', '=', 'users.id')
        // $product = DB::table('Contact')->join('Products', 'contact.products_id', '=', 'Products.id')
        //     ->where('user_id', '=', $user->id)
        //     ->select('Products.*', 'users.username')
        //     ->orderBy('updated_at', 'desc')
        //     ->get();
        // contact.products_id

        $product =  DB::table('contact')->join('products', 'contact.products_id', '=', 'products.id')
                // ->where('products.id', '=', 'contact.products_id')
                ->select('contact.*', 'products.productName', 'products.productPrice','products.productDetail', 'products.image_path')
                ->orderBy('updated_at', 'desc')
                ->get();

        if ($product) {
            return response()->json([
                'product' => $product,
                'message' => 'No Product yet',
            ]);
        }

        // return view('homePage')->with('contact', Products::orderBy('updated_at', 'desc')->get());


    }

    public function notification(){
        $product =  DB::table('contact')->join('products', 'contact.products_id', '=', 'products.id')
                ->select('contact.*', 'products.productName', 'products.productPrice','products.productDetail', 'products.image_path')
                ->where('contact.notification', '=', 0)
                ->orderBy('updated_at', 'desc')
                ->get();

                if ($product) {
                return response()->json([
                    'notification' => $product,
                    'message' => 'No New Notification',
                ]);
        }

    }

    public function notifyUpdate(Request $request)
    {
        $det = $request->input('notifyUpdate');

        $notifyUpdate = DB::table('contact')
            ->where('notification', '=', 0)
            ->increment('notification', 1);

    if ($notifyUpdate) {
        return response()->json([
            'status' => 200,
            'message' => 'done',
        ]);
    }

    }

    public function agent()
    {

        return view('agent.agentForm');
    }

    // public function fetchAgentDetails()
    // {

    //     $use = auth()->user();

    //     $agentDetails = DB::table('deliveryagent')->where('user_id', '=', $use->id)->get();
    //     return response()->json([
    //         'agentDetails' => $agentDetails,
    //         'message' => 'No Data yet',

    //     ]);

    // }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
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
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Contact::find($id);
        if ($product) {
            
            $product->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Product Deleted Successfully',
            ]);
        }
    }



// //Google Login
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

//Google callback
public function handleGoogleCallback()
{
    $user = Socialite::driver('google')->user();
    $this->_registerOrLoginUser($user);

    //Return to  Home After Login
    // return redirect()->route('home');
    return redirect()->route('DeliveryAgent');

}


//Facebook Login
public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

//Facebook callback
public function handleFacebookCallback()
{
    $user = Socialite::driver('facebook')->user();
    $this->_registerOrLoginUser($user);

    //Return to  Home After Login
    // return redirect()->route('home');
    return redirect()->route('DeliveryAgent');

}

protected function _registerOrLoginUser($data)
{
    $user = User::where('email', '=', $data->email)->first();
    if (!$user) {
        $user = new User();
        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->provider_id = $data->provider_id;
        $user->avatar = $data->avatar;
        $user->save();
    }

    Auth::login($user);
}
}
