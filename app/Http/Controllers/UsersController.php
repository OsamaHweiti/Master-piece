<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\users;
use Stripe\PaymentIntent;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $users = users::all();
        $sum = count($users);
        return view('/admin/adminusers', compact('users', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $user = Users::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'is_admin' => $request->input('is_admin'),
            'password' => Hash::make($request->input('password')),
        ]);
        if ($user) {
            return redirect('/admin/users');
        } else {
            return response('failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = users::find($id);
        if ($user) {
            return view('admin.adminuseredit', compact('user'));
        } else {
            return response('failed');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
           
            $obj = users::where('id', $id)->first();
            $obj->username = $request->username;
            $obj->email = $request->email;
            $obj->phone = $request->phone;
            $obj->password = Hash::make($request->input('password'));
            $obj->is_admin = $request->is_admin;
            $obj->update();
            // dd($obj);
            if ($obj) {
                return redirect('admin/users')->with('success', 'users is updated successfully.');
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $delete = users::destroy($id);

        // $x = users::find($id)->get()->each->delete();
       
        if ($delete)
        return redirect()->back()->with('success', 'User is Deleted successfully.');
        
    }
    public function Login(Request $request){
        $user = $request->validate([
            'password' => 'required',
            'email' => 'required|string|email',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = auth()->user(); 
            if ($user->is_admin) {
                return redirect('/admin');
            }
    
            return redirect('/');
        }
        else{
            return redirect('/login')->withErrors(['login' => 'Invalid email or password']);
        }

    }

    //
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'username' => 'required|string|max:32|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone'=>'required'
         
        ]);
        $user = new Users;
    $user->username = $validatedData['username'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']); 
    $user->phone  = $validatedData['phone'];

    
    $user->save();

   
    return redirect('/login')->with('success', 'User registered successfully.');

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Successfully logged out');
    }
    public function profile()
    {
        $userid = Auth::user()->id ;
        $subscription = Subscription::findorfail($userid);

        return view('/homepage/pages/profilepage', compact('subscription'));
       
    }
   
}
