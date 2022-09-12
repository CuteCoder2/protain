<?php

namespace App\Http\Controllers;

use App\Models\Service ;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('pages.services',['services'=>$service]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'service_des' => ['string','required'],
            'service_type' => ['string','required']
        ]);

        $id_service = Carbon::now()->timestamp;

        Service::create([
            'id_service' => $id_service,
            'type_service' =>$request->service_type,
            'description' =>$request->service_des
        ]);


        session()->flash('status','updated');
        return redirect()->route('service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $service = Service::where('id_service',$id)->first();
        // dd($id);
        return view('pages.editSerive',['services'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Service $services)
    {
    //  dd('updating');

     $request->validate([
        'service_des' => ['string','required'],
        'service_type' => ['string','required']
    ]);


    $service = $services->where('id_service',$request->id_service)->first();

    $service->update([
        'type_service' =>$request->service_type,
        'description' =>$request->service_des
    ]);


    session()->flash('status','updated');
    return redirect()->route('service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $services , $id)
    {
        $service = $services->where('id_service',$id)->first();

        $service->delete();
        session()->flash('status','deleted');
        return redirect()->route('service');
    }
}
