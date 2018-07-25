<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Bill;
use Image;
use Storage;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      	
        $bills = Auth::user()->bills()->paginate(10);


    return view('bills.index')->withBills($bills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $services = Service::where('users_id','=', $user)->paginate(10);
        return view('bills.create')->withServices($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate de data
        $this->validate($request, array(
                'date' 	      => 'required',
                'value'       => 'required',
                'services_id' 	  => 'required|integer',
                'featured_image' => 'sometimes|image|max:2048'

            ));
      
  
        //Store in the Database
        $bill = new Bill;

        $bill->date = $request->date;
        $bill->value = $request->value;
        $bill->services_id = $request->services_id;

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(700,300)->save($location);

            $bill->image = $filename;
        }
        
        $bill->save();

       

        //Redirect to Another Page
        return redirect()->route('bills.show', $bill->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);

        return view('bills.show')->withBill($bill);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $services = Service::where('users_id','=', $user)->paginate(10);
        $bill = Bill::find($id);
        return view('bills.edit')->withBill($bill)->withServices($services);
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
        
         $bill = Bill::find($id);

        $this->validate($request, array(
                'date' 	      => 'required',
                'value'       => 'required',
                'services_id' 	  => 'required|integer',
                'featured_image' => 'image',

            ));
      
  
        //Store in the Database

        $bill->date = $request->date;
        $bill->value = $request->value;
        $bill->services_id = $request->services_id;

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(700,300)->save($location);
            $oldFileName = $bill->image;
            $bill->image = $filename;
            Storage::delete($oldFileName);

        }
        
        $bill->save();

        

        //Redirect to Another Page
        return redirect()->route('bills.show', $bill->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        Storage::delete($bill->image);
        $bill->delete();

        

        return redirect()->route('bills.index');
    }
}
