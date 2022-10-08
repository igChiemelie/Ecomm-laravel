<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Message;
use Pusher\Pusher;
use Symfony\Component\HttpFoundation\Session\Session;
// Use Pusher\Pusher;
// use Illuminate\Session\SessionServiceProvider;




class PagesController extends Controller
{
    public function index()
    {
        // $product = Products::all();
        // dd($product);
        // print_r($product);
        return view('homePage')->with('products', Products::orderBy('updated_at', 'desc')->get());

    }

    public function fetchAllProduct()
    {
    // $product = DB::table('Products')
    //     ->select('Products.*')
    //     ->orderBy('updated_at', 'desc')
    //     ->get();

    // if ($product) {
    //     return response()->json([
    //         'product' => $product,
    //         // 'message' => 'No Product yet',
    //         //   'user_id' = auth()->user()->id;

    //     ]);
    // }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'contactName' => 'required',
            'contactEmail' => 'required',
            'contactNumber' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else {
            // If prdId is []
            // Loop tru and save each array and return appropriate response
            // dd($request->input('productId'));

            // session::put([
            //         "product_id"=>3,
            //         "quantity"=>4,
            //     ],
            //     [
            //     "product_id"=>12,
            //     "quantity"=>1,
            //    ]
            //  );

             

            $prdIds = explode(",", $request->input('productId'));
            $quantityId = explode(",", $request->input('quantity'));
            $quantityIdLen = count($quantityId);
            session()->put("products", $prdIds = explode(",", $request->input('productId')));
            session()->put("quantity", $quantityId = explode(",", $request->input('quantity')));
            // dd($quantityId);
            // dd($quantityIdLen);
            // foreach ($prdIds as $key => $pIdd) {
            //     # code...
            //     $details = new Contact;
            //     $details->contactName = $request->input('contactName');
            //     $details->contactEmail = $request->input('contactEmail');
            //     $details->contactNumber = $request->input('contactNumber');
            //     $details->subject = $request->input('contactMessage');
            //     for ($i = 0; $i < $quantityIdLen; $i++) {
            //         foreach ($quantityId as $key6 => $onuogu) {
            //             $details->quantity = $quantityId[$key6];

            //         }
            //     }
            //     $details->products_id = $pIdd;


            //     $details->save();

            // // }
            // }
            foreach(session()->get("products") as $key => $row){
                // var_dump($key);
                // var_dump($row);
                // echo $row;
                $details = new Contact;
                $details->contactName = $request->input('contactName');
                $details->contactEmail = $request->input('contactEmail');
                $details->contactNumber = $request->input('contactNumber');
                $details->subject = $request->input('contactMessage');
                $details->quantity = session()->get("quantity")[$key];
                $details->products_id = $row;
                $details->save();
                // var_dump($details->quantity);
            }


            return response()->json([
                'status' => 200,
                'extraInfo' => $prdIds,
                'message' => 'Product Added Successfully',
            ]);

            
            // $request->session()->forget(["products","quantity"]);
            // session()->flush();

        }



    }

    public function views(Request $request)
    {
        $det = $request->input('views');

        $view = DB::table('Products')
            ->where('id', $det)
            ->increment('views', 1);

    // if ($view) {
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Product Updated Successfully',
    //     ]);
    // }

    }

    public function chat()
    {

        //select all users except logged in user
        // $users = User::where('id', '!=', Auth::id())->get();
        $id = Auth::user()->id;

        //count how many messages are unread from the selected user
        $users = DB::select("select users.id, users.username,users.avatar,users.email, count(is_read) as unread
        from users LEFT JOIN messages ON users.id = messages.from and is_read = 0 and messages.to = " . $id . " 
        where users.id != " . $id . " 
        group by users.id, users.username, users.avatar,users.email");

        return view('pages.chat', ['users' => $users]);
    // dd($users);
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        // return $user_id;
        //when click to see message selected  user"s message will be read, update
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
        //get all mesaage for the selected user
        //getting those message which is from = Auth::id() = user_id OR from = user_id and to = Auth::id();
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();


        return view('messages.index', ['messages' => $messages]);
    // dd($messages);
    }



    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();


        // Pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
            );

        $data = ['from' => $from, 'to' => $to]; //sending from and to user_id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function about()
    {
        return view('pages.about');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }


    public function delivery()
    {
        return view('pages.deliveryAgent');
    }


}
