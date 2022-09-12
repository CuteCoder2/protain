<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('pages.client',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => ['required','email','max:255','string','unique:clients,email'],
            'company' => ['required','max:200','string'],
            'first_name' => ['required','max:100','string'],
            'last_name' => ['required','max:100','string'],
            'phone' => ['required','max:100','string'],
            'location' => ['required','max:100','string'],
        ]);


        $client = Client::create([
        "id_client" => $request->email,
        "nom"  => $request->first_name ,
        "prenom" => $request->last_name ,
        "tel" => $request->phone ,
        "email" => $request->email,
        "nom_entre" => $request->company,
        "localisation" => $request->location,
        ]);
        session()->flash('status','created');
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client,$id)
    {
        $clients = $client->where('email',$id)->first();
        return view('pages.editClient',['client'=>$clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $request->validate([
            'email' => ['required','email','max:255','string'],
            'company' => ['required','max:200','string'],
            'first_name' => ['required','max:100','string'],
            'last_name' => ['required','max:100','string'],
            'phone' => ['required','max:100','string'],
            'location' => ['required','max:100','string'],
        ]);

        $client = Client::where('email',$request->email);
        $client->update([
            "nom"  => $request->first_name ,
            "prenom" => $request->last_name ,
            "tel" => $request->phone ,
            "email" => $request->email,
            "nom_entre" => $request->company,
            "localisation" => $request->location,
        ]);
        session()->flash('status','updated');
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('status','deleted');
        return redirect()->back();
    }
}
