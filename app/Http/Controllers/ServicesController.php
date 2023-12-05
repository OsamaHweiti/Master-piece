<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Log;
use App\Models\prices;
use App\Models\services;
use Termwind\Components\Dd;
use Illuminate\Http\Request;

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
    public function homepage()
    {
        $services = services::all();
        $prices = prices::all();
        return view('homepage.index', compact('services','prices'));
    }
    public function serviespage()
    {
        $services = services::all();
        
        return view('homepage.pages.services', compact('services'));
    }


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
    public function edit($id)
    {
        $service = services::find($id);
        if ($service) {
            return view('admin.adminservicesedit', compact('service'));
        } else {
            return response('failed');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $service = services::find($id);
    
        if (!$service) {
            return redirect('admin/services')->with('error', 'Service not found.');
        }
    
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'description' => 'required',
        ]);
    
        try {
           
            if ($request->hasFile('photo')) {
                $request->validate([
                    'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
                ]);
    
                $ext = $request->file('photo')->extension();
                $final_name = time() . '.' . $ext;
                $request->file('photo')->move(public_path('uploads/'), $final_name);
    
             
                if (file_exists(public_path('uploads/' . $service->photo))) {
                    unlink(public_path('uploads/' . $service->photo));
                }

                $service->photo = $final_name;
            }
    
        
            $service->name = $request->name;
            $service->description = $request->description;
    
            $service->save();
    
            return redirect('admin/services')->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            // Log the exception for debugging
          logger()->channel('applog')->debug("AdminController - update - Exception occurred", ['exception' => $e]);
    
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the service.');
        }
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

    public function subsshow()
    {
        $subs = Subscription::all();
        // $services = services::all();
        $sum = count($subs);
        
        return view('/admin/adminsub', compact('subs', 'sum'));
    }
}
