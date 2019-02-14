<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Product;
use App\Cart;
use App\User;
use App\Exchange;
use App\ExchangeDetails;
use App\Notifications\UserRequestedExchange;


class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request, $id)
    {
        $userToProducts  =  Product::where('user_id',$id)->get();
        $userFromProducts  =  Product::where('user_id',Auth::user()->id)->get();



        $oldCart = Session::get('cart') ;
        $cart = new Cart($oldCart);

        $request->session()->put('userToProducts', $userToProducts);
        $request->session()->put('userFromProducts', $userFromProducts);


        if(!Session::has('cart')) {
          return view('exchange.new',compact('userToProducts'),compact('userFromProducts'))->with(['products' => null]);
        }



        return view('exchange.new',compact('userToProducts'),compact('userFromProducts'))->with(['products' => $cart->items]);
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function sendExchange($button, $NotifId)
    {

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);



      $cartItems = $cart->items;

      $productsTo = Session::get('userToProducts');
      $productsFrom = Session::get('userFromProducts');

      $exchangeInSession = Session::get('exchange');





      foreach ($productsFrom as $product)  {
          $compFrom = $product->user_id;
          $compFromName =  User::find($compFrom);
      }
      foreach ($productsTo as $product)  {
          $compTo = $product->user_id;
          $compTomName =  User::find($compFrom);
      }


      $diffUserFromProducts = false;
      $diffUserToProducts = false;
      foreach ($cartItems as $item)  {

          if($compFrom == $item['item']['user_id']){
            $diffUserFromProducts = true;
          }
          if($compTo == $item['item']['user_id']){
            $diffUserToProducts = true;
          }


      }


      if(!$diffUserFromProducts){
        return redirect()->back()->with('message', 'Tiene que elegir al menos un producto para intercambiar ')->with('compFromName',"");
      }
      if(!$diffUserToProducts){
        return redirect()->back()->with('message', 'Tiene que elegir al menos un producto de ')->with('compFromName',$compTomName->name);
      }

      if( $exchangeInSession!=null ){
          if($button == "Cambiar!" ){
            $notification = auth()->user()->notifications()->find($NotifId);

            if($notification) {
                $notification->markAsRead();
            }

            $exchangedetails = ExchangeDetails::all();
            $query = ExchangeDetails::select('*')->where('exchange_id', $exchangeInSession->id)->get();

            $exch_user_from = $exchangeInSession->user_from;
            $exch_user_to = $exchangeInSession->user_to;

            foreach ( $query as $items) {
                $product = Product::find($items->product_id);

                if($product->user_id != $exch_user_from){

                    DB::table('products')->where('id', $product->id)->update(['user_id' => $exch_user_from]);

                }else{
                  DB::table('products')->where('id', $product->id)->update(['user_id' => $exch_user_to]);
                }
            }

            DB::table('exchanges')->where('id', $exchangeInSession->id)->update(['status' => "completado"]);
            $user = Auth::user();

            $exchange = Exchange::where('id',$exchangeInSession->id)->get();

            $exchange = Exchange::where('id',$exchangeInSession->id)->get();

            $userTo = User::find($exchangeInSession->user_to);



            session()->forget('cart');
            session()->forget('exchange');





          }else{
            DB::table('exchanges')->where('id', $exchangeInSession->id)->update(['user_from' => $compFrom]);
            DB::table('exchanges')->where('id', $exchangeInSession->id)->update(['user_to' => $compTo]);


            DB::table('exchangedetails')->where('exchange_id', $exchangeInSession->id)->delete();

            foreach ($cartItems as $item)  {

                DB::table('exchangedetails')->insert(
                  [
                    'exchange_id' => $exchangeInSession->id,
                    'product_id' => $item['item']['id']
                  ]
                );




            }

            $exchange = Exchange::where('id',$exchangeInSession->id)->get();


            foreach ($productsTo as $product)  {
                $compTo = $product->user_id;
                $compTomName =  User::find($compFrom);
            }
            $userTo = User::find($compTo);

            $userTo->notify(new UserRequestedExchange($exchange, $compTomName));

            session()->forget('cart');
            session()->forget('exchange');

            $notification = auth()->user()->notifications()->find($NotifId);

            if($notification) {
                $notification->markAsRead();
            }

          }

      }else{
        $idExchange = DB::table('exchanges')->insertGetId(
          [
            'user_from' => $compFrom,
            'user_to' => $compTo,
            'status' => 'pendiente',
          ]
        );

        foreach ($cartItems as $item)  {

            DB::table('exchangedetails')->insert(
              [
                'exchange_id' => $idExchange,
                'product_id' => $item['item']['id']
              ]
            );


        }
        $exchange = Exchange::where('id',$idExchange)->get();

        $userTo = User::find($compTo);




        $userTo->notify(new UserRequestedExchange($exchange, $compTomName));

        session()->forget('cart');
        session()->forget('exchange');
      }







      //\Notification::send($exchange, new UserRequestedExchange($exchange));

      return view('exchange.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showExchange($id,$NotifId)
    {
      //$exchange = Exchange::find($id);

      //$exchangedetails = ExchangeDetails::where('exchange_id', '=', $id)->firstOrFail();

      $user = Auth::user();



      //$user->unreadNotifications()->update(['read_at' => now()]);

      $exchange = Exchange::find($id);
      $exchangedetails = ExchangeDetails::all();
      $query = ExchangeDetails::select('*')->where('exchange_id', $id)->get();





      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);


        //dd(($query->contains('product_id', '81')));
        $bool = false;
        $button = "Cambiar!";
        if($cart->items!=null){
          foreach ( $cart->items as $cart_items) {

              if(!($query->contains('product_id', $cart_items['item']['id']))){
                $bool = true;

              }


          }
        }

        if($bool){
            $button = "Retrueque!";
        }

      foreach ($query as $products) {
        $product = Product::find($products->product_id);
        $cart->add($product, $product->id);
     }

      session()->put('cart', $cart);



      $userToProducts  =  Product::where('user_id',$exchange->user_from)->get();
      $userFromProducts  =  Product::where('user_id',Auth::user()->id)->get();

      session()->put('userToProducts', $userToProducts);
      session()->put('userFromProducts', $userFromProducts);

      session()->put('exchange', $exchange);

      return view('exchange.show',compact('userToProducts'),compact('userFromProducts', 'NotifId'))->with(['products' => $cart->items])->with(['button'=>$button]);
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
    public function addProduct(Request $request, $id)
    {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);




        $userToProducts =Product::whereIn('user_id',function($query) use ($id){
           $query->select('user_id')
                   ->from('products')->where('id', '=',$id);
                 })->get();



        $userFromProducts  =  Product::where('user_id',Auth::user()->id)->get();







        if(!Session::has('cart')) {
          return view('exchange.new',compact('userToProducts'),compact('userFromProducts'))->with(['products' => $cart->items]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);



        return redirect()->back();


    }

    public function deleteProduct($id)
    {

       $oldCart = Session::has('cart') ? Session::get('cart') : null;
       $cart = new Cart($oldCart);
       $cart->deleteItem($id);

       Session::put('cart', $cart);
        //then you can redirect or whatever you need
        return redirect()->back();


    }

    public function rejectExchange($NotifId)
    {

        $notification = auth()->user()->notifications()->find($NotifId);

        if($notification) {
            $notification->markAsRead();
        }

        $exchangeInSession = Session::get('exchange');
        session()->forget('cart');
        session()->forget('exchange');
        DB::table('exchanges')->where('id', $exchangeInSession->id)->update(['status' => "rechazado"]);
        return view ('/home');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
