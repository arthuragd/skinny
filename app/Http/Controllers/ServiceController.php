<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Session;

class ServiceController extends Controller
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
        $user = Auth::user()->id;
        $services = Service::where('users_id','=', $user)->paginate(10);

        return view('services.index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('services.create')->withUser($user);
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
                'name' 	      => 'required|max:45',
                'phone'       => 'required|max:10',
                'razsocial'   => 'required|max:50',
                'seller'      => 'required|max:50',
                'sellerphone' => 'required|max:10',

            ));
      
  
        //Store in the Database
        $service = new Service;

        $service->name = $request->name;
        $service->phone = $request->phone;
        $service->users_id = $request->user()->id;
        $service->razsocial  = $request->razsocial;
        $service->seller = $request->seller;
        $service->sellerphone = $request->sellerphone;

        $service->save();

        Session::flash('success','The service was succesfully save!');

        //Redirect to Another Page
        return redirect()->route('services.show', $service->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('services.show')->withService($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('services.edit')->withService($service);
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
        
        $service = Service::find($id);
        
       $this->validate($request, array(
                'name' 	      => 'required|max:45',
                'phone'       => 'required|max:10',
                'razsocial'   => 'required|max:50',
                'seller'      => 'required|max:50',
                'sellerphone' => 'required|max:10',

            ));
        
        //Store in the Database
        $service->name = $request->name;
        $service->phone = $request->phone;
        $service->razsocial  = $request->razsocial;
        $service->seller = $request->seller;
        $service->sellerphone = $request->sellerphone;

        $service->save();

        Session::flash('success','This service was succesfully updated!');

        return redirect()->route('services.show', $service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        Session::flash('success',' The service was succesfully deleted!');

        return redirect()->route('services.index');
    }
}
