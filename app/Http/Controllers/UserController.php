<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;
use App\Exchange;
use App\ExchangeDetails;
use App\Product;



class UserController extends Controller
{

    public function profile(){

      $exchangeFrom = Exchange::where('user_from',Auth::user()->id)->get();
      $exchangeTo = Exchange::where('user_to',Auth::user()->id)->get();

      $exchangedetails = ExchangeDetails::all();
      $users = User::all();
      $products = Product::all();

      return view('profile',array('user' => Auth::user()),compact('exchangeFrom', 'exchangeTo', 'exchangedetails', 'products', 'users')  );
    }


    public function user_profile($id){

        $user = User::find($id);
        $products = Product::where('user_id',$id)->get();
        return view('user_profile',array('user' => $user), compact('products') );
    }


    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()) );

    }

    public function sendRating(){

      $response = array(
        'status' => 'success',
        'msg' => $request->message,
      );

      return response()->json($response);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update( User $user)
    {
        /*$this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);*/



        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        return back();
    }
}
