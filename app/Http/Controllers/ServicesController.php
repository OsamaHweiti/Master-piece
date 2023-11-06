<?php

namespace App\Http\Controllers;

use App\Models\services;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = services::all();
        $sum = count($service);
        return view('/admin/adminservices', compact('service', 'sum'));
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
        //  dd($request);
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required ',
            'description' => 'required ',
           
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj = new services();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        
        $obj->save();
   
        if ($obj) {
            return redirect('admin/services')->with('success', 'Added service successfully.');
            // return $request->input();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = services::destroy($id);

        // $x = users::find($id)->get()->each->delete();
       
        if ($delete)
        return redirect()->back()->with('success', 'User is Deleted successfully.');
    }
}
