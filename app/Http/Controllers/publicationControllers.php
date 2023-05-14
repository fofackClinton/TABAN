<?php

namespace App\Http\Controllers;

use App\Models\ChambrePublication;
use App\Models\VehiculPublication;
use Illuminate\Http\Request;

class publicationControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pub =ChambrePublication::all();
         return view('index',compact('pub'));
    }
    public function index1()
    {
         $pub =VehiculPublication::all();
         return view('index1',compact('pub'));
    }

    public function voiture()
    {
         $pub =VehiculPublication::all();
         return view('voiture.reservation',compact('pub'));
    }
    public function reservationH($id)
    {
        $pub = ChambrePublication::find($id);

         //ChambrePublication::all();
         return view('chambre.reservation',compact('pub'));
    }
      public function reservationV($id)
    {
        $pub = VehiculPublication::find($id);
         //$pub =ChambrePublication::all();
         return view('voiture.reservation',compact('pub'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function delete1($id)
    {
        VehiculPublication::where('ID_PUBLICATION',$id)->delete();
        return back()->with('success', 'publication effacer');

    }
    public function delete2($id)
    {
        ChambrePublication::where('ID_C_PUB',$id)->delete();
        return back()->with('success', 'publication effacer');

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
    public function showV($id)
    {
        //
        $pub = VehiculPublication::where('ID_VEHICUL',$id)->get();
        return view('voiture.reservation', compact('pub'));
    }
    public function showH($id)
    {
        //
        $pub = ChambrePublication::where('ID_CHAMBRE',$id)->get();
        return view('voiture.reservation', compact('pub'));
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
