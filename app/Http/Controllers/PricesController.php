<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\prices;
use App\Models\services;
use App\Models\Subscription;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricesController extends Controller
{
  
    public function index()
    {
        $prices = prices::all();
        $services = services::all();

        $sum = count($prices);
        return view('/admin/adminpricing', compact('prices', 'sum','services'));
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required ',
            'ram' => 'required ',
            'storage' => 'required ',
            'price' => 'required ', 
        ]);
        // dd($request);
        $obj = new prices();
        $obj->name = $request->name;
        $obj->service_id = $request->service_id;
        $obj->ram = $request->ram;
        $obj->storage = $request->storage;
        $obj->price = $request->price;


        
        $obj->save();
   
        if ($obj) {
            return redirect('admin/pricing')->with('success', 'Added price successfully.');
        
        }
    }

   

   
    public function edit(prices $prices)
    {
        //
    }

   
    public function update(Request $request, prices $prices)
    {
        //
    }

   
    public function destroy($id)
    {
        $delete = prices::destroy($id);

        // $x = users::find($id)->get()->each->delete();
       
        if ($delete)
        return redirect()->back()->with('success', 'Price is Deleted successfully.');
    }
    public function pricespage()
    {
        $prices = prices::all();
        $services = services::all();

        
        return view('/homepage/pages/pricing', compact('prices', 'services'));
    }
    public function checkout($id)
    {   
        if(Auth::check()){
        $price = prices::findorfail($id)->first();
        
        // dd($price);
        if ($price){
        return view('/homepage/pages/checkout',  ['price' => $price]);}
         }  
        else{
        return redirect("/login")->with('error', 'Please login to continue');
        }
    }
    public function pay(Request $request){
        Stripe::setApiKey("sk_test_51OJwGjCuw1NUH63a81oAD8XYCdHUt1HNtHWXVmOtJ6ffIPsXU1KkSULoz0Az929WhpbwUWB9HEE1nHHM01FGhZ8F00ap3pTWX4");
    
        $amount = $request->input('price');
        $amountInJOD = $amount;
        $amountInFils = $amountInJOD * 1000;
        $paymentMethodId = $request->input('payment_method_id');
    
        $paymentIntent = PaymentIntent::create([
            'amount' => $amountInFils,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
            'payment_method' => $paymentMethodId,
            'confirmation_method' => 'manual', 
            'confirm' => true,
            'return_url' => route('home'),
        ]);
    
        if ($paymentIntent->status === 'succeeded') {
            $userid = Auth::user()->id ;
            $order = new Subscription; 
            $order->user_id = $userid;
            $order->price_id = $request->input('price_id');
            $order->save();
           
      
            return redirect()->route('home')->with('success', 'Payment successful!');
        } else {
            return redirect()->back()->with('error', 'Payment failed. Please try again.');
        }
    
        }
    

}
