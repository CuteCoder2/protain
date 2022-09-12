<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Service;
use App\Models\Vercement;
use Illuminate\Http\Request;

class VercementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vercement = Vercement::with(['commande'])->paginate(10);


        return view('pages.allversement',['vercements'=>$vercement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $commande = Commande::with(['client', 'service'])->where('id_commande', $id)->first();

        return view('pages.versement', ['commande' => $commande]);
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
            "id_commande" => ['required', 'string', 'exists:commandes,id_commande'],
            "montan" => ['required', 'integer']
        ]);

        // recherech de la commande
        $commande = Commande::where('id_commande', $request->id_commande)->first();

        if ($request->montan > $commande->reste) {
            return redirect()->back()->withErrors(['msg'=>'le vercement ne peux pas etre superiuex au montan restan']);
        }

        $reste = $commande->reste - $request->montan ;


        $commande->update([
            'reste' => $reste,
            'status' => "1"
        ]);

        if($reste === 0){

            $commande->update([
                'status' => "2"
            ]);
        }

        Vercement::create([
            'versement'=>$request->montan,
            "id_commande"=>$request->id_commande,
        ]);

        $vercement = Vercement::with(['commande'])->paginate(10);

        return view('pages.allversement',['vercements'=>$vercement]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vercement  $vercement
     * @return \Illuminate\Http\Response
     */
    public function show(Vercement $vercement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vercement  $vercement
     * @return \Illuminate\Http\Response
     */
    public function edit(Vercement $vercement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vercement  $vercement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vercement $vercement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vercement  $vercement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vercement $vercement)
    {
        //
    }
}
