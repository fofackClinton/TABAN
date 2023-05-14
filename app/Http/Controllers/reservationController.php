<?php

namespace App\Http\Controllers;

use App\Models\HotelReservation;
use App\Models\VehiculReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $res = HotelReservation::where('ID_USERS', $id);
        return view('hotel.reservation', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createH()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeC(Request $request)
    {
        //
        //dd($request);
        try {

            DB::beginTransaction();
            HotelReservation::create([
                'ID_C_PUB'=>$request->id_pub,
                 'ID_USERS'=>$request->iduser,
                 'PRIX'=>$request->prix,
                 'DATE_DEBUT'=>$request->dateD,
                 'DATE_FIN'=>$request->dateF,
                 'NOM'=>$request->photo,
                 'IDD'=>$request->idd,

            ]);
            DB::commit();
            return redirect('/acceuil')->with('success','reservation effectuer vous resevreer un amil de confirmation');
        } catch (\Throwable $th) {
            //throw $th;
            echo'ca vas aller';
        }
    }
    public function storeV(Request $request)
    {
        //dd($request);
        try {

            DB::beginTransaction();
            VehiculReservation::create([
                'ID_PUBLICATION'=>$request->idP,
                 'ID_USERS'=>$request->idu,
                 'DATE_DEBUT'=>$request->dateD,
                 'DATE_FIN'=>$request->dateF,
                 'IDD'=>$request->idd,
                 'NOM'=>$request->photo,

            ]);
            DB::commit();
            return redirect('/acceuil1')->with('success','reservation effectuer vous resevreer un amil de confirmation');
        } catch (\Throwable $th) {
            //throw $th;
            echo'ca vas aller';
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
}
