<?php

namespace App\Http\Controllers;

use App\Http\Requests\agenceRequest;
use App\Models\Agence;
use App\Models\Vehicule;
use App\Models\VehiculPublication;
use App\Models\VehiculReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class agenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agence.Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
        //try {

            DB::beginTransaction();
            $requestData = $request->all();
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $requestData["photo"] = '/storage/'.$path;
            //dd($requestData);
            Agence::create([
                'ID_USERS'=>$requestData["id"],
                'NOM'=>$requestData["name"],
                'VILLE'=>$requestData["ville"],
                'DOCUMENT'=>$requestData["photo"],
                //'VILLE'=>$requestData["ville"],
                'RCCM'=>$requestData["rccm"],
            ]);
            DB::commit();
            return redirect('/users/log')->with('success', 'agence creer connectez vous');


        //} catch (\Throwable $th) {
            //throw $th;
            //return $th;
            //echo'ca ne passe pas merde';
       // }









    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $agence = Agence::all();
        return view("agence.afficher", compact('agence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publication($id)
    {
       $pub = VehiculPublication::where('IDC',$id)->get();
       return view('voiture.publication', compact('pub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resa($id)
    {
        $ch = VehiculReservation::where('ID_USERS',$id)->get();
        return view('agence.reservation', compact('ch'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            DB::beginTransaction();

            Vehicule::where("ID_AGENCE", $id)->delete();

            Agence::find($id)->delete();

            DB::commit();

            return back();

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
