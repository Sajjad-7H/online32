<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Http\Controllers\Book;
use Stripe;
use Session;
use Illuminate\Http\RedirectResponse;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;





class HomeController extends Controller
{
    public function index(){
        $user =User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliverd = Order::where('status','Delivered')->get()->count();
    return view('admin.index',compact('user','product','order','deliverd'));

    }

    public function home()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }

        return view('home.index',compact('product','count'));

    }

    public function login_home()
    {
        $product = Product::all();
        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }


        return view('home.index',compact('product','count'));

    }


    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added to Cart Successfully');

        
        return redirect()->back();


    }

    public function mycart()
        {
            
            if(Auth::id())
            {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
    
            }


            return view('home.mycart',compact('count','cart'));


        }

        public function delete_cart($id)
        {
            $data = Cart::find($id);
    
            $data->delete();
    
            flash()->success('The product has been Removed successfully');
    
            return redirect()->back();
        }
        public function comfirm_order(Request $request)
        {
            $name = $request->name;
            $address = $request->address;
            $phone = $request->phone;
            $userid = Auth::user()->id;
            $cart = Cart::where('user_id',$userid)->get();

            foreach($cart as $carts)
            {
                $order = new Order;
                $order->name = $name;
                $order->rec_address = $address;
                $order->phone = $phone;
                $order->user_id = $userid;
                $order->product_id = $carts->product_id;
                $order->save();
                
            }
            $cart_remove = Cart::where('user_id',$userid)->get();

            foreach($cart_remove as $remove)
            {
                $data = Cart::find($remove->id);
                $data->delete();
            }
            toastr()->timeOut(5000)->closeButton()->addSuccess('Book Order Successfully');

            return redirect()->back();

            
        }

        public function myorders()
        {
            $user = Auth::user()->id;
            $count = Cart::where('user_id',$user)->get()->count();
            $order = Order::where('user_id',$user)->get();
            return view('home.order',compact('count','order'));

        }

        public function shop()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }

        return view('home.shop',compact('product','count'));

    }

    public function why()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }

        return view('home.why',compact('count'));

    }

    public function contact()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }

        return view('home.contact',compact('count'));

    }
    public function offers()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();

        }
        else{
            $count = '';

        }

        return view('home.offers',compact('count'));

    }


    public function showBooks(Request $request)
{
    $category = $request->query('category');

    if ($category == 'E-book') {
        $product = Product::where('category', 'E-book')->get();
    } else {
        $product = Product::all();
    }

    return view('home.books', compact('product'));
}

public function showAudios(Request $request)
{
    $category = $request->query('category');

    if ($category == 'E-audio') {
        $product = Product::where('category', 'E-audio')->get();
    } else {
        $product = Product::all();
    }

    return view('home.eaudio', compact('product'));
}



public function showNotes(Request $request)
{
    $category = $request->query('category');

    if ($category == 'notes') {
        $product = Product::where('category', 'notes')->get();
    } else {
        $product = Product::all();
    }

    return view('home.notes', compact('product'));
}

public function showBookMela(Request $request)
{
    $category = $request->query('category');

    if ($category == 'bookmela') {
        $product = Product::where('category', 'bookmela')->get();
    } else {
        $product = Product::all();
    }

    return view('home.bookmela', compact('product'));
}
  
public function showIslamic(Request $request)
{
    $category = $request->query('category');

    if ($category == 'islamic') {
        $product = Product::where('category', 'islamic')->get();
    } else {
        $product = Product::all();
    }

    return view('home.islamic', compact('product'));
}
       

public function showBengali(Request $request)
{
    $category = $request->query('category');

    if ($category == 'bengali') {
        $product = Product::where('category', 'bengali')->get();
    } else {
        $product = Product::all();
    }

    return view('home.bengali', compact('product'));
}
       
public function showChildrenBooks(Request $request)
{
    $category = $request->query('category');

    if ($category == 'childrenbooks') {
        $product = Product::where('category', 'childrenbooks')->get();
    } else {
        $product = Product::all();
    }

    return view('home.childrenbooks', compact('product'));
}

public function showHistorical(Request $request)
{
    $category = $request->query('category');

    if ($category == 'historical') {
        $product = Product::where('category', 'historical')->get();
    } else {
        $product = Product::all();
    }

    return view('home.historical', compact('product'));
}

public function showAdventure(Request $request)
{
    $category = $request->query('category');

    if ($category == 'adventure') {
        $product = Product::where('category', 'adventure')->get();
    } else {
        $product = Product::all();
    }

    return view('home.adventure', compact('product'));
}

public function showThriller(Request $request)
{
    $category = $request->query('category');

    if ($category == 'thriller') {
        $product = Product::where('category', 'thriller')->get();
    } else {
        $product = Product::all();
    }

    return view('home.thriller', compact('product'));
}

public function showBiography(Request $request)
{
    $category = $request->query('category');

    if ($category == 'biography') {
        $product = Product::where('category', 'biography')->get();
    } else {
        $product = Product::all();
    }

    return view('home.biography', compact('product'));
}

public function showMystery(Request $request)
{
    $category = $request->query('category');

    if ($category == 'mystery') {
        $product = Product::where('category', 'mystery')->get();
    } else {
        $product = Product::all();
    }

    return view('home.mystery', compact('product'));
}

public function showSelfhelp (Request $request)
{
    $category = $request->query('category');

    if ($category == 'selfhelp') {
        $product = Product::where('category', 'selfhelp')->get();
    } else {
        $product = Product::all();
    }

    return view('home.selfhelp', compact('product'));
}

public function showHorror(Request $request)
{
    $category = $request->query('category');

    if ($category == 'horror') {
        $product = Product::where('category', 'horror')->get();
    } else {
        $product = Product::all();
    }

    return view('home.horror', compact('product'));
}

public function showGoosebumps(Request $request)
{
    $category = $request->query('category');

    if ($category == 'goosebumps') {
        $product = Product::where('category', 'goosebumps')->get();
    } else {
        $product = Product::all();
    }

    return view('home.goosebumps', compact('product'));
}   

public function stripe($value): View

{

    return view('home.stripe', compact('value'));

}
public function stripePost(Request $request,$value): RedirectResponse

{

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

  

    Stripe\Charge::create ([

            "amount" => $value * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from complete" 

    ]);
    Session::flash('success','Payment sucessful');
    return back();

       
        
}


public function profile()
    {
        $user = Auth::user();
        return view('home.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('home.profile')->with('success', 'Profile updated successfully!');
    }




}