<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Service;
use App\Models\Commande;
use App\Notifications\ClientNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        // dd($services);

        $commands = Commande::with(['client'])->paginate(10);

        return view('pages.command',['commands'=>$commands , 'services'=>$services]);
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
            'client_email' => ['required','string','exists:clients,email'],
            'service' => ['required','string','exists:services,id_service'],
            'type_comd' => ['required','string'],
            'cous' => ['required','string'],
            'start' => ['required',"date"],
            'end' => ['required',"date"],
        ]);

        $client = Client::where('email',$request->client_email)->first();
        $id_command = Carbon::now()->timestamp;
        $start = Carbon::parse($request->start)->format("Y-m-d");

        $end = Carbon::parse($request->end)->format("Y-m-d");

        $commande = Commande::create([
            'id_commande'=>$id_command,
            'status' => "0",
            'type_comd' => $request->type_comd,
            'cout' => $request->cous,
            'reste' => $request->cous,
            'start' => $start,
            'end' => $end,
            'id_client' => $client->id_client,
            'id_service' => $request->service,
            'username' => Auth::user()->username,
        ]);

        $client->notify((new ClientNotification($commande)));
            // Notification::send($client,);
            session()->flash('status','updated');

        return redirect('commande');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $command = Commande::where('id_commande',$id)->first();
        $services = Service::all();

        return view('pages.editCommande',['commandes'=>$command,'services'=>$services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $request->validate([
            'client_email' => ['required','string','exists:clients,email'],
            'service' => ['required','string','exists:services,id_service'],
            'cous' => ['required','string'],
            'id' => ['required','string'],
        ]);


        $client = Client::where('email',$request->client_email)->first();

        $commande = Commande::where('id_commande',$request->id)->first();
        $commande->update([
            'id_client' => $client->id_client,
            'id_service' => $request->service,
            'cout' => $request->cous,
        ]);

        session()->flash('status','updated');
        return redirect('commande');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = Commande::where('id_commande',$id)->first();
        $commande->delete();
        session()->flash('status','deleted');
        return redirect('commande');
    }
}
